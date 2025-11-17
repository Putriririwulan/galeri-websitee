<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\TentangKami;
use App\Models\News;
use App\Models\About;
use App\Models\AboutDetail;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil parameter kategori dari URL
        $categoryFilter = request()->get('category', null);
        
        // Ambil data galeri dengan filter kategori jika ada (untuk section galeri umum & pencarian)
        if ($categoryFilter) {
            // Filter galeri berdasarkan nama kategori
            $galleries = Gallery::with('category')
                ->whereHas('category', function ($query) use ($categoryFilter) {
                    $query->where('name', $categoryFilter);
                })
                ->latest()
                ->get();
        } else {
            // Tampilkan semua galeri (tanpa batasan) untuk keperluan lain di beranda
            $galleries = Gallery::with('category')->latest()->get();
        }
        
        $categories = Category::all();
        $data = TentangKami::first();
        
        // Ambil maksimal 6 berita terkini yang sudah published untuk beranda
        $news = News::where('status', 'published')
                    ->orderBy('published_date', 'desc')
                    ->take(6)
                    ->get();
        
        // Ambil data tentang kami (Sejarah & Visi Misi)
        $abouts = About::all();

        // Ambil 1 galeri terbaru per kategori untuk ditampilkan di beranda (Galeri Sekolah)
        // Urutkan berdasarkan tanggal upload terbaru dan batasi maksimal 6 galeri
        $featuredGalleries = Gallery::with('category')
            ->latest()
            ->get()
            ->unique('category_id')
            ->take(6)
            ->values();

        // Kirim ke view
        return view('user.dashboard', compact('galleries', 'featuredGalleries', 'categories', 'data', 'news', 'abouts', 'categoryFilter'));
    }

    public function tentangKami()
    {
        $tentangKami = TentangKami::first();
        $about = About::first();
        
        return view('user.tentangkami', [
            'title' => 'Tentang Kami',
            'tentangKami' => $tentangKami,
            'about' => $about
        ]);
    }

    /**
     * Menampilkan halaman detail satu berita untuk pengguna
     */
    public function newsDetail(News $news)
    {
        return view('user.news.news_detail', [
            'title' => $news->title,
            'news'  => $news,
        ]);
    }

    /**
     * Menampilkan halaman semua berita
     */
    public function allNews()
    {
        // Ambil semua berita dengan status "published" (kolom ini sudah dipakai di index())
        $news = News::where('status', 'published')
                    ->orderBy('published_date', 'desc')
                    ->paginate(6); // 6 berita per halaman

        return view('user.news.news_page', [
            'title' => 'Berita Terkini',
            'news'  => $news,
        ]);
    }

    public function gallery()
    {
        $categories     = Category::all();
        $categoryFilter = request()->get('category');

        $galleriesQuery = Gallery::with('category')->latest();

        if ($categoryFilter) {
            $galleriesQuery->whereHas('category', function ($q) use ($categoryFilter) {
                $q->where('name', $categoryFilter);
            });
        }

        $galleries = $galleriesQuery->paginate(12)->withQueryString();

        return view('user.gallery', compact('categories', 'galleries', 'categoryFilter'));
    }

    /**
     * Menampilkan halaman detail untuk satu galeri + foto terkait berdasarkan kategori yang sama
     */
    public function galleryDetail(Gallery $gallery)
    {
        $gallery->load('category');

        // Jika ada query ?download=1 dan file tersedia, kirim file untuk di-download
        if (request()->boolean('download') && $gallery->cover_image && Storage::disk('public')->exists($gallery->cover_image)) {
            return Storage::disk('public')->download($gallery->cover_image, basename($gallery->cover_image));
        }

        $relatedGalleries = Gallery::with('category')
            ->where('category_id', $gallery->category_id)
            ->where('id', '!=', $gallery->id)
            ->latest()
            ->take(8)
            ->get();

        $fileSizeKb = null;
        if ($gallery->cover_image && Storage::disk('public')->exists($gallery->cover_image)) {
            $bytes = Storage::disk('public')->size($gallery->cover_image);
            $fileSizeKb = $bytes ? round($bytes / 1024) : null;
        }

        return view('user.gallery-detail', [
            'gallery'          => $gallery,
            'relatedGalleries' => $relatedGalleries,
            'fileSizeKb'       => $fileSizeKb,
        ]);
    }
}
