# 📰 Dokumentasi Manajemen Berita & Tentang Kami

## 🚀 Instalasi & Setup

### 1. Jalankan Migration
```bash
php artisan migrate
```

### 2. Jalankan Seeder untuk Data Awal Tentang Kami
```bash
php artisan db:seed --class=AboutSeeder
```

### 3. Buat Storage Link (jika belum)
```bash
php artisan storage:link
```

---

## 📋 Fitur yang Tersedia

### ✅ Manajemen Berita Terkini
- **List Berita** - Lihat semua berita dengan pagination
- **Tambah Berita** - Upload berita baru dengan gambar
- **Edit Berita** - Update berita yang sudah ada
- **Hapus Berita** - Hapus berita
- **Status** - Draft atau Published
- **Tanggal Publish** - Set tanggal publish berita

### ✅ Manajemen Tentang Kami
- **Sejarah Sekolah** - Edit konten sejarah
- **Visi & Misi** - Edit konten visi & misi
- **Upload Gambar** - Tambah gambar untuk setiap section

---

## 🔗 Route yang Tersedia

### Berita Terkini
- `GET /admin/news` - List berita
- `GET /admin/news/create` - Form tambah berita
- `POST /admin/news` - Simpan berita baru
- `GET /admin/news/{id}/edit` - Form edit berita
- `PUT /admin/news/{id}` - Update berita
- `DELETE /admin/news/{id}` - Hapus berita

### Tentang Kami
- `GET /admin/about` - List tentang kami (Sejarah & Visi Misi)
- `GET /admin/about/{id}/edit` - Form edit
- `PUT /admin/about/{id}` - Update

---

## 📁 Struktur Database

### Tabel `news`
| Field | Type | Description |
|-------|------|-------------|
| id | bigint | Primary key |
| title | string | Judul berita |
| content | text | Konten berita |
| image | string | Path gambar (nullable) |
| published_date | date | Tanggal publish |
| status | enum | draft / published |
| created_at | timestamp | |
| updated_at | timestamp | |

### Tabel `abouts`
| Field | Type | Description |
|-------|------|-------------|
| id | bigint | Primary key |
| type | enum | sejarah / visi_misi (unique) |
| title | string | Judul |
| content | text | Konten |
| image | string | Path gambar (nullable) |
| created_at | timestamp | |
| updated_at | timestamp | |

---

## 🎯 Cara Menggunakan

### Admin Panel

1. **Login sebagai Admin**
   - Akses: `http://localhost:8000/admin/login`

2. **Manajemen Berita**
   - Klik menu "Berita Terkini" di sidebar
   - Klik "Tambah Berita" untuk berita baru
   - Upload gambar, isi judul, konten, tanggal, dan status
   - Klik "Simpan Berita"

3. **Manajemen Tentang Kami**
   - Klik menu "Tentang Kami" di sidebar
   - Klik "Edit" pada card Sejarah atau Visi & Misi
   - Update konten dan gambar
   - Klik "Update"

---

## 📸 Upload Gambar

### Lokasi Penyimpanan
- Berita: `storage/app/public/news/`
- Tentang Kami: `storage/app/public/about/`

### Ketentuan
- Format: JPG, PNG, GIF
- Ukuran Max: 2MB
- Gambar otomatis tersimpan di storage Laravel

---

## 🔄 Integrasi dengan User Dashboard

### Update Controller User
Tambahkan di `App\Http\Controllers\User\DashboardController.php`:

```php
use App\Models\News;
use App\Models\About;

public function index()
{
    $galleries = Gallery::with('category')->latest()->get();
    $news = News::where('status', 'published')
                ->orderBy('published_date', 'desc')
                ->take(3)
                ->get();
    $abouts = About::all();
    
    return view('user.dashboard', compact('galleries', 'news', 'abouts'));
}
```

### Update View User Dashboard
Di `resources/views/user/dashboard.blade.php`, ganti hardcoded news dengan:

```blade
@foreach($news as $item)
    <div class="user-gallery-card">
        <div class="image-wrapper">
            <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}">
            <span class="category-badge">BERITA</span>
        </div>
        <div class="card-body">
            <div class="card-title">{{ $item->title }}</div>
            <div class="card-text">{{ Str::limit($item->content, 100) }}</div>
        </div>
        <div class="card-footer-dates">
            <div class="date-item">
                <span class="date-label">Published</span>
                <span class="date-value">{{ $item->published_date->format('d M Y') }}</span>
            </div>
        </div>
    </div>
@endforeach
```

---

## ✨ Tips & Best Practices

1. **Backup Database** sebelum menghapus berita
2. **Optimasi Gambar** sebelum upload untuk performa lebih baik
3. **Gunakan Status Draft** untuk berita yang belum siap publish
4. **Update Tentang Kami** secara berkala agar tetap relevan

---

## 🐛 Troubleshooting

### Gambar tidak muncul?
```bash
php artisan storage:link
```

### Error saat upload?
- Cek permission folder `storage/app/public`
- Pastikan ukuran file < 2MB

### Migration error?
```bash
php artisan migrate:fresh --seed
```

---

## 📞 Support

Jika ada pertanyaan atau issue, silakan hubungi developer.

**Happy Managing! 🎉**
