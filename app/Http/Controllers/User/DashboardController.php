<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\TentangKami;
use App\Models\News;
use App\Models\About;
use App\Models\AboutDetail;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil parameter kategori dari URL
        $categoryFilter = request()->get('category', null);
        
        // Ambil data galeri dengan filter kategori jika ada
        if ($categoryFilter) {
            // Filter galeri berdasarkan nama kategori
            $galleries = Gallery::with('category')
                ->whereHas('category', function($query) use ($categoryFilter) {
                    $query->where('name', $categoryFilter);
                })
                ->latest()
                ->get();
        } else {
            // Tampilkan semua galeri
            $galleries = Gallery::with('category')->latest()->get();
        }
        
        $categories = Category::all();
        $data = TentangKami::first();
        
        // Ambil berita terkini (3 berita terbaru yang published)
        $news = News::where('status', 'published')
                    ->orderBy('published_date', 'desc')
                    ->take(3)
                    ->get();
        
        // Ambil data tentang kami (Sejarah & Visi Misi)
        $abouts = About::all();

        // Ambil 1 galeri terbaru per kategori untuk ditampilkan di beranda (Galeri Sekolah)
        $featuredGalleries = $galleries->sortByDesc('created_at')->unique('category_id')->values();

        // Kirim ke view
        return view('user.dashboard', compact('galleries', 'featuredGalleries', 'categories', 'data', 'news', 'abouts', 'categoryFilter'));
    }

    public function tentangKami()
    {
        // Ambil data tentang kami (Sejarah & Visi Misi)
        $abouts = About::all();
        
        // Ambil detail tambahan tentang kami (cards)
        $aboutDetails = AboutDetail::where('is_active', true)
                                   ->orderBy('order')
                                   ->get();

        return view('user.tentangkami', compact('abouts', 'aboutDetails'));
    }

    public function gallery()
    {
        $categories = Category::all();
        $galleries = Gallery::with('category')->latest()->paginate(12);

        return view('user.gallery', compact('categories', 'galleries'));
    }
}
