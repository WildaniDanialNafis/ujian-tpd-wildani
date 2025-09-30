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

* **Dashboard**
  <img width="1917" height="1080" alt="image" src="https://github.com/user-attachments/assets/6ba45289-ca55-4dda-b6d0-a65d6fa308f8" />
* **Arsip Surat** ![Arsip Surat](https://via.placeholder.com/800x400?text=Arsip+Surat)
  <img width="1917" height="1080" alt="image" src="https://github.com/user-attachments/assets/e11f2c1c-8aa2-4931-90cf-048f7d246e6b" />
  <img width="1917" height="1080" alt="image" src="https://github.com/user-attachments/assets/b8706341-f2ad-4933-a8b8-feccb87c8cd4" />
  <img width="1917" height="1080" alt="image" src="https://github.com/user-attachments/assets/d72cfedc-80f7-4182-a425-5d154c13b271" />
* **Kategori Surat** ![Kategori](https://via.placeholder.com/800x400?text=Kategori)
  <img width="1917" height="1080" alt="image" src="https://github.com/user-attachments/assets/b3fd8137-d47f-4dcf-b7bd-5f20fc65c28f" />
  <img width="1917" height="1080" alt="image" src="https://github.com/user-attachments/assets/4fd6845d-2377-47b3-9077-18984e8b843f" />
  <img width="1917" height="1080" alt="image" src="https://github.com/user-attachments/assets/459899df-9753-4ef2-a946-afb96fa4e1ac" />
* **Halaman About** ![About](https://via.placeholder.com/800x400?text=About)
  <img width="1917" height="1080" alt="image" src="https://github.com/user-attachments/assets/9c4960b2-8fed-4042-a891-61a649d4d2f0" />
* **Preview Surat** ![Preview](https://via.placeholder.com/800x400?text=Preview+Surat)
  <img width="1917" height="1080" alt="image" src="https://github.com/user-attachments/assets/768a4947-7d80-4f37-a0a8-38e9605a774b" />

---

## Catatan Penting

* Folder `storage` dan `bootstrap/cache` harus writable
* File PDF disimpan di `storage/app/public/surat`
* Untuk production, jalankan `php artisan config:cache`
* Membutuhkan **PHP 8.2+** dan Laravel 12

---

