# Setup Math CAPTCHA (Anti-Robot) untuk Login Admin

## Tentang Math CAPTCHA

Math CAPTCHA adalah sistem verifikasi anti-robot sederhana yang menggunakan pertanyaan matematika dasar. Sistem ini:
- ✅ **Tidak memerlukan API key eksternal** (tidak perlu Google reCAPTCHA)
- ✅ **Ringan dan cepat** - tidak ada loading dari server eksternal
- ✅ **Random questions** - pertanyaan berubah setiap kali
- ✅ **User-friendly** - mudah dijawab oleh manusia
- ✅ **Efektif** - mencegah bot otomatis

## Cara Kerja

1. Sistem generate random math question (penjumlahan, pengurangan, atau perkalian)
2. User harus menjawab dengan benar sebelum bisa login
3. Jika salah, CAPTCHA akan refresh dengan pertanyaan baru
4. Validasi dilakukan di frontend (JavaScript) dan backend (Laravel)

---

## ~~Langkah 1: Dapatkan API Keys dari Google~~ (TIDAK DIPERLUKAN)

1. Kunjungi [Google reCAPTCHA Admin Console](https://www.google.com/recaptcha/admin)
2. Login dengan akun Google Anda
3. Klik tombol **"+"** untuk membuat site baru
4. Isi form dengan informasi berikut:
   - **Label**: SMK Negeri 4 Login Admin
   - **reCAPTCHA type**: Pilih **reCAPTCHA v2** → "I'm not a robot" Checkbox
   - **Domains**: Tambahkan domain Anda (contoh: `localhost`, `smkn4bogor.sch.id`)
   - Centang "Accept the reCAPTCHA Terms of Service"
5. Klik **Submit**
6. Anda akan mendapatkan:
   - **Site Key** (untuk frontend)
   - **Secret Key** (untuk backend)

## Langkah 1: Validasi di Backend (Controller)

Update controller login admin Anda (contoh: `app/Http/Controllers/Admin/AuthController.php`):

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    
    public function loginSubmit(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'captcha_answer' => 'required|numeric',
            'captcha_correct' => 'required|numeric',
        ], [
            'captcha_answer.required' => 'Mohon jawab pertanyaan CAPTCHA.',
            'captcha_answer.numeric' => 'Jawaban CAPTCHA harus berupa angka.',
        ]);
        
        // Verifikasi Math CAPTCHA
        $userAnswer = (int) $request->input('captcha_answer');
        $correctAnswer = (int) $request->input('captcha_correct');
        
        if ($userAnswer !== $correctAnswer) {
            return back()
                ->withInput($request->only('username'))
                ->with('error', 'Jawaban CAPTCHA salah. Silakan coba lagi.');
        }
        
        // Proses login
        $credentials = $request->only('username', 'password');
        
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        
        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah.');
    }
    
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }
}
```

## Langkah 2: Update Routes

Pastikan routes sudah benar di `routes/web.php`:

```php
use App\Http\Controllers\Admin\AuthController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
```

## Testing

1. Buka halaman login: `http://localhost/admin/login`
2. Perhatikan pertanyaan CAPTCHA yang muncul (contoh: "7 + 3 = ?")
3. Coba login dengan jawaban CAPTCHA yang **salah** → akan muncul error dan pertanyaan baru
4. Jawab CAPTCHA dengan **benar** dan login dengan kredensial yang valid
5. Jika berhasil, akan redirect ke dashboard admin

## Fitur Math CAPTCHA

### Random Questions
- **Penjumlahan**: 1-10 + 1-10 (contoh: 5 + 7 = ?)
- **Pengurangan**: Angka besar - angka kecil (selalu positif)
- **Perkalian**: 1-5 × 1-5 (hasil tidak terlalu besar)

### Auto-Refresh
- Jika jawaban salah, CAPTCHA otomatis generate pertanyaan baru setelah 2 detik
- Pertanyaan berubah setiap kali page reload

### Validasi Ganda
- **Frontend**: JavaScript validation sebelum submit
- **Backend**: Laravel validation di controller

## Troubleshooting

### CAPTCHA tidak muncul?
- Cek console browser untuk JavaScript error
- Pastikan JavaScript enabled di browser
- Clear browser cache

### Jawaban benar tapi tetap error?
- Pastikan input type="number" berfungsi
- Cek validasi di controller sudah benar
- Pastikan hidden input `captcha_correct` terisi

### Pertanyaan tidak berubah?
- Refresh halaman untuk generate pertanyaan baru
- Cek fungsi `generateCaptcha()` di JavaScript

## Keamanan Tambahan

1. **Rate Limiting**: Tambahkan throttle di routes
```php
Route::post('/login', [AuthController::class, 'loginSubmit'])
    ->middleware('throttle:5,1')
    ->name('login.submit');
```

2. **HTTPS**: Gunakan HTTPS di production
3. **Strong Password Policy**: Implementasi password yang kuat
4. **2FA**: Pertimbangkan Two-Factor Authentication untuk keamanan ekstra
5. **Session Security**: Pastikan session config aman

## Catatan Penting

- ✅ **Tidak perlu API key** - Math CAPTCHA bekerja tanpa layanan eksternal
- ✅ **Ringan dan cepat** - tidak ada dependency eksternal
- ✅ **User-friendly** - mudah dijawab oleh manusia
- ⚠️ **Keamanan menengah** - cukup untuk mencegah bot sederhana
- 💡 **Upgrade**: Untuk keamanan lebih tinggi, pertimbangkan Google reCAPTCHA v3

## Kelebihan Math CAPTCHA

1. **Tidak perlu internet** untuk validasi (offline-friendly)
2. **Tidak ada tracking** dari pihak ketiga (privacy-friendly)
3. **Gratis selamanya** - tidak ada biaya atau quota
4. **Mudah di-customize** - bisa ubah tingkat kesulitan
5. **Accessible** - mudah untuk semua user

## Kekurangan

1. Bisa di-bypass oleh bot advanced dengan OCR
2. Tidak se-secure Google reCAPTCHA untuk traffic tinggi
3. Perlu validasi backend yang ketat

## Rekomendasi

- ✅ **Cocok untuk**: Website internal, traffic rendah-menengah
- ⚠️ **Pertimbangkan upgrade jika**: Traffic tinggi, sering diserang bot

---

Dokumentasi dibuat untuk SMK Negeri 4 Bogor
Tanggal: November 2025
Math CAPTCHA Implementation
