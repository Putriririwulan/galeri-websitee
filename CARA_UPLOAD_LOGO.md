# 📝 Cara Upload Logo SMK Negeri 4

## Langkah-Langkah:

### 1. **Buat Folder Images**
Buat folder baru di dalam folder `public`:
```
c:\xamppp\htdocs\galeri-websitee\public\images\
```

### 2. **Simpan Logo**
Simpan logo SMK Negeri 4 yang sudah kamu punya dengan nama:
```
logo-smkn4.png
```

Lokasi akhir file:
```
c:\xamppp\htdocs\galeri-websitee\public\images\logo-smkn4.png
```

### 3. **Format Logo**
- **Format:** PNG (dengan background transparan lebih bagus)
- **Ukuran:** Minimal 200x200 px (agar tidak pecah)
- **Nama file:** `logo-smkn4.png` (huruf kecil semua)

### 4. **Selesai!**
Setelah logo disimpan, refresh halaman admin dan logo topi 🎓 akan otomatis diganti dengan logo SMK Negeri 4.

---

## 📍 Lokasi Logo Muncul:

1. **Navbar Admin** (kiri atas)
2. **Sidebar** (atas sidebar)

---

## ⚠️ Troubleshooting:

### Logo Tidak Muncul?
1. Pastikan nama file **persis** `logo-smkn4.png` (huruf kecil)
2. Pastikan lokasi di `public/images/logo-smkn4.png`
3. Clear cache browser (Ctrl+F5)
4. Cek apakah file PNG tidak corrupt

### Logo Pecah/Blur?
- Gunakan logo dengan resolusi lebih tinggi (minimal 200x200 px)
- Pastikan format PNG dengan kualitas bagus

---

## 🎨 Kode yang Sudah Diupdate:

Kode CSS sudah diupdate untuk menggunakan logo image:

**Navbar:**
```css
background: url('/images/logo-smkn4.png') center/cover no-repeat;
```

**Sidebar:**
```css
background: url('/images/logo-smkn4.png') center/contain no-repeat;
```

---

**Dibuat pada:** 22 Oktober 2025  
**Fitur:** Ganti Logo Topi dengan Logo SMK Negeri 4
