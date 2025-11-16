<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\News;
use App\Models\About;
use App\Models\SystemInfo;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
   public function dashboard()
{
    $galleries = Gallery::latest()->get();
    $categories = Category::all();
    $news = News::latest()->get();
    $abouts = About::all();
    
    // Get or create system info
    $systemInfo = SystemInfo::firstOrCreate(
        ['id' => 1],
        [
            'system_name' => 'Galeri Sekolah',
            'system_version' => 'v1.0',
            'database_type' => 'MySQL',
            'status' => 'aktif'
        ]
    );
    
    // Statistik
    $stats = [
        'total_galleries' => Gallery::count(),
        'total_categories' => Category::count(),
        'total_news' => News::count(),
        'published_news' => News::where('status', 'published')->count(),
        'draft_news' => News::where('status', 'draft')->count(),
    ];
    
    // Notifikasi pesan kontak baru
    $unreadContacts = Contact::where('status', 'unread')->count();
    $latestContacts = Contact::where('status', 'unread')->latest()->take(5)->get();

    return view('admin.dashboard', compact('galleries', 'categories', 'news', 'abouts', 'stats', 'systemInfo', 'unreadContacts', 'latestContacts'));
}
    

    // 📸 List galeri
    public function index()
    {
        $galleries = Gallery::with('category')->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    // ➕ Form tambah
    public function create()
    {
        $categories = Category::all();
        return view('admin.galleries.create', compact('categories'));
    }

    // 💾 Simpan galeri baru
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Simpan file gambar kalau ada
        $path = null;
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('galleries', 'public');
        }

        Gallery::create([
            'title'       => $request->title,
            'description' => $request->description,
            'cover_image' => $path,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    // ✏️ Form edit
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $categories = Category::all();
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    // 🔄 Update galeri
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('cover_image')) {
            // Hapus file lama kalau ada
            if ($gallery->cover_image && Storage::disk('public')->exists($gallery->cover_image)) {
                Storage::disk('public')->delete($gallery->cover_image);
            }
            // Upload baru
            $gallery->cover_image = $request->file('cover_image')->store('galleries', 'public');
        }

        $gallery->title       = $request->title;
        $gallery->description = $request->description;
        $gallery->category_id = $request->category_id;
        $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil diperbarui');
    }

    // ❌ Hapus galeri
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus file gambar dari storage kalau ada
        if ($gallery->cover_image && Storage::disk('public')->exists($gallery->cover_image)) {
            Storage::disk('public')->delete($gallery->cover_image);
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil dihapus');
    }
}
