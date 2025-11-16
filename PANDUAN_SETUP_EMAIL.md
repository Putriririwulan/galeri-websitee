# 📧 Panduan Setup Email untuk Fitur Balas via Email

## ✅ Fitur yang Sudah Dibuat

Fitur "Balas via Email" sudah berhasil diimplementasikan dengan komponen berikut:

1. ✅ **Mailable Class** (`app/Mail/ReplyContactMail.php`)
2. ✅ **Template Email** (`resources/views/emails/reply-contact.blade.php`)
3. ✅ **Route** untuk kirim email (`routes/web.php`)
4. ✅ **Controller Method** (`app/Http/Controllers/Admin/ContactController.php`)
5. ✅ **Modal Form** di halaman detail pesan (`resources/views/admin/contacts/show.blade.php`)

---

## ⚙️ Cara Setup SMTP agar Email Bisa Terkirim

Untuk mengirim email, kamu perlu konfigurasi SMTP di file `.env`. Berikut panduannya:

### 🔹 Opsi 1: Menggunakan Gmail (Gratis)

#### Langkah 1: Buat App Password di Gmail

1. Login ke akun Gmail kamu
2. Buka **Google Account Settings**: https://myaccount.google.com/
3. Pilih **Security** (Keamanan)
4. Aktifkan **2-Step Verification** (Verifikasi 2 Langkah) jika belum aktif
5. Setelah aktif, cari **App passwords** (Password aplikasi)
6. Pilih **Mail** dan **Windows Computer** (atau Other)
7. Klik **Generate** → Salin password yang muncul (16 karakter)

#### Langkah 2: Edit File `.env`

Buka file `.env` di root project kamu, lalu ubah bagian MAIL menjadi:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=emailkamu@gmail.com
MAIL_PASSWORD=abcd efgh ijkl mnop    # App Password yang tadi di-generate (16 karakter)
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=emailkamu@gmail.com
MAIL_FROM_NAME="Admin Galeri Website"
```

**Catatan Penting:**
- Ganti `emailkamu@gmail.com` dengan email Gmail kamu
- Ganti `MAIL_PASSWORD` dengan App Password yang sudah di-generate (16 karakter, bisa pakai spasi atau tidak)
- **JANGAN** pakai password Gmail biasa, harus pakai **App Password**

---

### 🔹 Opsi 2: Menggunakan Mailtrap (Untuk Testing)

Mailtrap adalah layanan untuk testing email tanpa mengirim email sungguhan ke user.

#### Langkah 1: Daftar di Mailtrap

1. Buka https://mailtrap.io/
2. Daftar akun gratis
3. Setelah login, buka **Email Testing** → **Inboxes**
4. Pilih inbox atau buat inbox baru
5. Klik **Show Credentials**

#### Langkah 2: Edit File `.env`

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username    # Dari Mailtrap
MAIL_PASSWORD=your_mailtrap_password    # Dari Mailtrap
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=admin@galeri.test
MAIL_FROM_NAME="Admin Galeri Website"
```

**Keuntungan Mailtrap:**
- Email tidak benar-benar terkirim ke user (aman untuk testing)
- Bisa lihat preview email di dashboard Mailtrap
- Cocok untuk development/testing

---

### 🔹 Opsi 3: Menggunakan SMTP Hosting

Jika kamu punya hosting dengan SMTP, gunakan konfigurasi ini:

```env
MAIL_MAILER=smtp
MAIL_HOST=mail.domainmu.com           # SMTP host dari hosting
MAIL_PORT=465                          # Atau 587
MAIL_USERNAME=admin@domainmu.com       # Email hosting
MAIL_PASSWORD=password_email_hosting
MAIL_ENCRYPTION=ssl                    # Atau tls
MAIL_FROM_ADDRESS=admin@domainmu.com
MAIL_FROM_NAME="Admin Galeri Website"
```

---

## 🧪 Cara Testing Fitur Email

Setelah setup SMTP, ikuti langkah ini untuk testing:

### 1. Restart Laravel (Penting!)

Setelah edit `.env`, **WAJIB** restart Laravel agar perubahan diterapkan:

```bash
# Jika pakai php artisan serve
Ctrl+C (stop server)
php artisan serve (start lagi)

# Jika pakai XAMPP
Restart Apache
```

### 2. Clear Cache (Opsional tapi Disarankan)

```bash
php artisan config:clear
php artisan cache:clear
```

### 3. Test Kirim Email

1. Login ke dashboard admin
2. Buka menu **Contacts** atau **Pesan**
3. Klik salah satu pesan untuk melihat detail
4. Klik tombol **"Balas via Email"** (warna hijau)
5. Modal form akan muncul
6. Isi **Subject** dan **Isi Balasan**
7. Klik **"Kirim Email"**
8. Tunggu beberapa detik
9. Jika berhasil, akan muncul notifikasi **"✓ Berhasil! Email berhasil dikirim ke ..."**
10. Jika gagal, akan muncul notifikasi error

### 4. Cek Email Terkirim

- **Jika pakai Gmail**: Cek inbox penerima (email yang ada di database)
- **Jika pakai Mailtrap**: Cek dashboard Mailtrap → Inboxes
- **Jika pakai SMTP Hosting**: Cek inbox penerima

---

## ❌ Troubleshooting (Jika Email Gagal Terkirim)

### Error: "Connection could not be established"

**Penyebab:**
- SMTP host/port salah
- Firewall/antivirus memblokir koneksi

**Solusi:**
1. Pastikan `MAIL_HOST` dan `MAIL_PORT` benar
2. Coba ganti `MAIL_PORT` dari 587 ke 465 (atau sebaliknya)
3. Coba ganti `MAIL_ENCRYPTION` dari `tls` ke `ssl` (atau sebaliknya)
4. Matikan sementara antivirus/firewall untuk testing

---

### Error: "Failed to authenticate on SMTP server"

**Penyebab:**
- Username/password salah
- Belum pakai App Password (jika pakai Gmail)

**Solusi:**
1. Pastikan `MAIL_USERNAME` dan `MAIL_PASSWORD` benar
2. Jika pakai Gmail, **WAJIB** pakai App Password (bukan password Gmail biasa)
3. Restart Laravel setelah edit `.env`

---

### Error: "SMTP Error: Could not connect to SMTP host"

**Penyebab:**
- Port diblokir oleh ISP/hosting
- Koneksi internet bermasalah

**Solusi:**
1. Coba ganti port (587 atau 465)
2. Cek koneksi internet
3. Jika di localhost, pastikan tidak ada firewall yang memblokir

---

### Email Terkirim tapi Masuk ke Spam

**Solusi:**
1. Gunakan email domain sendiri (bukan Gmail) untuk production
2. Setup SPF, DKIM, dan DMARC di DNS domain
3. Gunakan layanan email profesional (SendGrid, Mailgun, dll)

---

## 📝 Catatan Penting

1. **Jangan commit file `.env`** ke Git (sudah ada di `.gitignore`)
2. **Jangan share App Password** ke orang lain
3. **Untuk production**, disarankan pakai layanan email profesional seperti:
   - SendGrid
   - Mailgun
   - Amazon SES
   - Postmark
4. **Fitur ini tidak mengubah database** (sesuai permintaan kamu)
5. **Tidak ada history email** yang tersimpan di database

---

## 🎉 Selesai!

Jika sudah setup SMTP dengan benar, fitur "Balas via Email" sudah siap digunakan!

**Jika ada error atau pertanyaan, silakan hubungi developer.**

---

**Dibuat pada:** 22 Oktober 2025  
**Versi Laravel:** 11.x  
**Fitur:** Balas Pesan via Email (Tanpa Mengubah Database)
