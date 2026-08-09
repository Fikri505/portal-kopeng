# Portal Digital UMKM & Wisata Desa Kopeng

Portal informasi digital dan peta interaktif untuk UMKM (Usaha Mikro, Kecil, dan Menengah) serta destinasi wisata di Desa Kopeng, Kecamatan Getasan, Kabupaten Semarang, Jawa Tengah.

## 🚀 Fitur Utama

- **Halaman Beranda**: Hero banner, UMKM & wisata unggulan, pratinjau peta interaktif, serta CTA.
- **Daftar & Detail UMKM**: Pencarian, filter kategori, detail informasi lengkap, tombol kontak WhatsApp langsung, dan tautan navigasi Google Maps.
- **Daftar & Detail Wisata**: Pencarian, filter kategori, info harga tiket, fasilitas pendukung, serta tautan navigasi Google Maps.
- **Peta Interaktif (Leaflet.js)**: Pemetaan seluruh lokasi UMKM dan wisata dengan penanda (marker) yang dapat difilter secara real-time.
- **Admin Panel (Filament v5)**: Manajemen data UMKM, Wisata, dan Kategori secara dinamis dengan dukungan upload gambar, koordinat lokasi (latitude/longitude), dan status publikasi (publish/unpublish).

## 🛠️ Stack Teknologi

- **Backend**: Laravel 12.x (PHP 8.2+)
- **Admin Panel**: Filament v5
- **Database**: MySQL / MariaDB (XAMPP)
- **Frontend**: Laravel Blade + Tailwind CSS v4
- **Peta Interaktif**: Leaflet.js & OpenStreetMap
- **JavaScript**: Vanilla JS

## 📦 Persyaratan Sistem

- PHP >= 8.2 (dengan ekstensi `pdo_mysql`, `intl`, `mbstring`, `openssl`, `gd`)
- Composer >= 2.9
- Node.js >= v20 & npm >= 10
- MySQL / MariaDB (XAMPP / Standalone)

## 🔧 Panduan Instalasi (Lokal)

1. **Clone Repository**
   ```bash
   git clone https://github.com/Fikri505/portal-kopeng.git
   cd portal-kopeng
   ```

2. **Instalasi Dependency PHP & Node.js**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   Salin file `.env.example` ke `.env` dan atur koneksi database:
   ```env
   APP_NAME="Portal Kopeng"
   APP_URL=http://localhost:8000
   APP_LOCALE=id

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=portal_kopeng
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate App Key & Storage Symlink**
   ```bash
   php artisan key:generate
   php artisan storage:link
   ```

5. **Migrasi Database & Seeding Data Awal**
   ```bash
   php artisan migrate --seed
   ```
   *Kredensial Admin default:*
   - Email: `admin@portalkopeng.id`
   - Password: `password`

6. **Menjalankan Server Pengembang**
   Jalankan server Laravel dan Vite secara bersamaan:
   ```bash
   php artisan serve
   ```
   Di terminal terpisah:
   ```bash
   npm run dev
   ```

7. **Akses Aplikasi**
   - Halaman Publik: [http://localhost:8000](http://localhost:8000)
   - Admin Panel: [http://localhost:8000/admin](http://localhost:8000/admin)

## 🧪 Pengujian Otomatis

Untuk menjalankan suite pengujian Laravel:
```bash
php artisan test
```

## 📝 Lisensi

Proyek MVP ini dikembangkan untuk program KKN Desa Kopeng. Open-source di bawah lisensi [MIT](LICENSE).
