Berikut versi README yang diperbarui dan disesuaikan untuk **Laravel 12**. Saya sudah menyesuaikan instruksi migrasi, seeding, dan build assets sesuai Laravel 12:

---

# Aplikasi Arsip Surat - Desa Karangduren

Aplikasi ini dibuat untuk membantu kelurahan Karangduren dalam mengarsipkan surat-surat resmi yang diterbitkan oleh perangkat desa, berbasis **Laravel 12**.

---

## Tujuan

* Menyimpan dan mengelola arsip surat resmi dalam format PDF
* Memudahkan pencarian, pengunduhan, dan pengelolaan surat
* Memberikan fitur kategori surat yang fleksibel
* Menyediakan halaman "About" untuk informasi developer

---

## Fitur

1. **Halaman Utama (Dashboard)**

   * Pencarian surat berdasarkan judul
   * Tombol `Arsipkan Surat` untuk menambah surat baru
   * Tombol `Hapus` dengan konfirmasi
   * Tombol `Unduh` untuk menyimpan file PDF
   * Tombol `Lihat` untuk membuka detail surat

2. **Arsip Surat**

   * Upload file PDF
   * Pilih kategori dari: `Undangan`, `Pengumuman`, `Nota Dinas`, `Pemberitahuan`
   * Pesan konfirmasi ketika data berhasil disimpan

3. **Kategori Surat**

   * Melihat daftar kategori
   * Tambah, edit, hapus kategori surat
   * ID kategori dibuat otomatis

4. **Konfirmasi Hapus**

   * Memastikan data tidak terhapus tanpa persetujuan user

5. **Halaman Lihat Surat**

   * Preview detail surat
   * Tombol `Kembali <<` untuk kembali ke dashboard
   * Tombol `Unduh` untuk menyimpan file PDF

6. **Halaman About**

   * Menampilkan foto developer
   * Menampilkan nama dan NIM
   * Menampilkan tanggal pembuatan aplikasi

---

## Persiapan Sistem

**Windows:**

* Install [XAMPP](https://www.apachefriends.org/)
* Install [Composer](https://getcomposer.org/)
* Install [Node.js & NPM](https://nodejs.org/)
* Install [Git](https://git-scm.com/)

**Linux (Ubuntu/Debian):**

```bash
sudo apt update
sudo apt install php mysql-server composer nodejs npm git unzip
```

---

## Instalasi Laravel 12

1. **Clone repository**

```bash
git clone https://github.com/WildaniDanialNafis/ujian-tpd-wildani.git
cd ujian-tpd-wildani
```

2. **Install dependencies PHP**

```bash
composer install
```

3. **Install dependencies frontend**

```bash
npm install
```

4. **Buat file `.env`**

```bash
cp .env.example .env
```

5. **Sesuaikan konfigurasi database di `.env`**

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_ujian_tpd
DB_USERNAME=root
DB_PASSWORD=
```

6. **Generate application key**

```bash
php artisan key:generate
```

---

## Setup Database

**Opsi 1: Migrasi dan Seeding (Disarankan)**

```bash
# Buat database terlebih dahulu
mysql -u root -p -e "CREATE DATABASE \`db_ujian_tpd\`;"

# Jalankan migrasi dan seeding
php artisan migrate:fresh --seed
```

**Opsi 2: Import SQL File**

```bash
mysql -u root -p db_ujian_tpd < database/database.sql
```

---

## Jalankan Aplikasi

1. **Compile frontend assets**

```bash
# Development
npm run dev

# Production
npm run build
```

2. **Jalankan server Laravel**

```bash
php artisan serve
```

3. **Akses aplikasi di browser**
   [http://localhost:8000](http://localhost:8000)

---

## Troubleshooting

* **Permission Error (Linux/Mac)**

```bash
sudo chown -R $USER:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

* **Database Connection Error**

  * Pastikan MySQL/MariaDB aktif
  * Pastikan kredensial di `.env` benar
  * Reset database jika perlu:

```bash
php artisan migrate:fresh --seed
```

* **Assets Tidak Muncul**

```bash
npm run dev
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

---

## Screenshot Aplikasi

* **Dashboard** ![Dashboard](https://via.placeholder.com/800x400?text=Dashboard)
* **Arsip Surat** ![Arsip Surat](https://via.placeholder.com/800x400?text=Arsip+Surat)
* **Kategori Surat** ![Kategori](https://via.placeholder.com/800x400?text=Kategori)
* **Halaman About** ![About](https://via.placeholder.com/800x400?text=About)
* **Preview Surat** ![Preview](https://via.placeholder.com/800x400?text=Preview+Surat)

---

## Catatan Penting

* Folder `storage` dan `bootstrap/cache` harus writable
* File PDF disimpan di `storage/app/public/surat`
* Untuk production, jalankan `php artisan config:cache`
* Membutuhkan **PHP 8.2+** dan Laravel 12

---

