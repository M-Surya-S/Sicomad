# SICOMAD (Sistem Informasi Company Profile dan Penjualan)

SICOMAD adalah sistem informasi berbasis web yang dirancang untuk Toko **Rahmad Gorden dan Wallpaper** di Samarinda. Sistem ini dibuat untuk mengatasi keterbatasan promosi dan memperluas jangkauan pasar toko dengan menyediakan platform digital berupa website company profile dan penjualan online.

## ✨ Fitur Utama
- **Company Profile**  
  Menampilkan informasi lengkap mengenai Toko Rahmad Gorden dan Wallpaper.
- **Katalog Produk**  
  Daftar produk gorden dan wallpaper yang tersedia dengan detail deskripsi dan harga.
- **Keranjang Belanja & Checkout**  
  Fitur pemesanan produk secara online.
- **Layanan Perbaikan**  
  Formulir layanan perbaikan gorden & wallpaper.
- **Dashboard Admin**  
  - Kelola kategori produk  
  - Kelola produk (tambah, edit, hapus)  
  - Kelola pesanan pelanggan  
- **Dashboard Super Admin**  
  - Manajemen akun admin dan customer  

## 🛠️ Teknologi yang Digunakan
- **Backend**: PHP 8 + Laravel Framework  
- **Frontend**: Blade Template, Bootstrap, Tailwind CSS  
- **Database**: MySQL  
- **Metodologi Pengembangan**: Scrum Framework  

## 🚀 Cara Menjalankan
1. Clone repository:
   ```bash
   git clone https://github.com/M-Surya-S/Sicomad.git
   cd Sicomad
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```
3. Salin file `.env.example` menjadi `.env` dan konfigurasi database sesuai kebutuhan.
   ```bash
   cp .env.example .env
   ```
4. Generate key aplikasi:
   ```bash
   php artisan key:generate
   ```
5. Jalankan migrasi database:
   ```bash
   php artisan migrate
   ```
6. Jalankan server:
   ```bash
   php artisan serve
   npm run dev
   ```

## 📂 Struktur Direktori
```
app/         -> Kode backend (Laravel)
bootstrap/   -> File bootstrap framework
config/      -> Konfigurasi aplikasi
database/    -> Migration & seeder
public/      -> Assets & entry point
resources/   -> Views (Blade), CSS, JS
routes/      -> Definisi routes web & API
storage/     -> Cache, logs, dll
```

## 🎯 Tujuan Proyek
- Meningkatkan visibilitas Toko Rahmad Gorden dan Wallpaper secara online.  
- Mempermudah akses pelanggan terhadap katalog produk & layanan.  
- Memperluas jangkauan pasar dengan promosi digital.  
- Memberikan pengalaman belanja yang lebih modern dan praktis.  

## 📄 Lisensi
Proyek ini dibuat untuk tujuan akademik di **Institut Teknologi Kalimantan**.  
