# AngelaBook

AngelaBook adalah proyek sederhana berbasis PHP yang memungkinkan pencarian buku berdasarkan judul atau penulis. Proyek ini menggunakan database MySQL. Berikut adalah panduan untuk membuat database di localhost menggunakan phpMyAdmin dan mengimpor file SQL yang terdapat di repository ini.

## Cara Membuat Database di Localhost

1. **Buka phpMyAdmin:**

   - Pastikan Anda telah menjalankan server lokal Anda (XAMPP, WAMP, atau software serupa).
   - Akses phpMyAdmin melalui browser dengan membuka `http://localhost/phpmyadmin`.

2. **Buat Database Baru:**

   - Klik menu **Databases** di phpMyAdmin.
   - Masukkan nama database `angelabook` di kolom input.
   - Pilih **utf8_general_ci** sebagai collation (opsional, namun direkomendasikan).
   - Klik tombol **Create** untuk membuat database.

3. **Import File SQL:**

   - Setelah database `angelabook` berhasil dibuat, klik nama database tersebut di sidebar kiri.
   - Pilih tab **Import** di bagian atas halaman.
   - Klik tombol **Choose File** dan pilih file SQL yang terdapat di repository ini (misalnya: `angelabook.sql`).
   - Klik tombol **Go** untuk mengimpor data.

4. **Verifikasi Data:**
   - Setelah proses impor selesai, Anda akan melihat tabel-tabel yang telah dibuat di database `angelabook`.
   - Buka tabel `books` untuk memastikan data buku telah berhasil diimpor.

## Struktur File Repository

- `index.php` : Halaman utama untuk menampilkan buku dan melakukan pencarian.
- `koneksi.php` : File koneksi database.
- `search.php` : Endpoint untuk pencarian data buku.
- `assets/` : Folder berisi file gambar dan resource lainnya.
- `angelabook.sql` : File SQL untuk membuat dan mengisi tabel di database.

## Kebutuhan Sistem

- **Server Lokal:** XAMPP, WAMP, atau lainnya dengan PHP dan MySQL.
- **Browser:** Untuk mengakses phpMyAdmin dan aplikasi.
- **PHP Version:** Minimum versi 7.4 (disarankan menggunakan versi terbaru).
- **MySQL Version:** Minimum versi 5.7.
