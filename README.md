# Aplikasi Arsip Surat - Desa Karangduren

Aplikasi ini dibuat untuk membantu kelurahan Karangduren dalam mengarsipkan surat-surat resmi yang diterbitkan oleh perangkat desa.  

---

## Tujuan

Tujuan dari aplikasi ini adalah:

- Menyimpan dan mengelola arsip surat resmi dalam format PDF.  
- Memudahkan pencarian, pengunduhan, dan pengelolaan surat.  
- Memberikan fitur kategori surat yang fleksibel.  
- Menyediakan halaman “About” untuk informasi developer.

---

## Fitur

1. **Halaman Utama (Dashboard)**
   - Pencarian surat berdasarkan judul.
   - Tombol `Arsipkan Surat` untuk menambah surat baru.
   - Tombol `Hapus` dengan konfirmasi.
   - Tombol `Unduh` untuk menyimpan file PDF.
   - Tombol `Lihat` untuk membuka detail surat.

2. **Arsip Surat**
   - Upload file PDF.
   - Pilih kategori dari: `Undangan`, `Pengumuman`, `Nota Dinas`, `Pemberitahuan`.
   - Pesan konfirmasi ketika data berhasil disimpan.

3. **Kategori Surat**
   - Melihat daftar kategori.
   - Tambah, edit, hapus kategori surat.
   - ID kategori dibuat otomatis.

4. **Konfirmasi Hapus**
   - Memastikan data tidak terhapus tanpa persetujuan user.

5. **Halaman Lihat Surat**
   - Preview detail surat.
   - Tombol `Kembali <<` untuk kembali ke dashboard.
   - Tombol `Unduh` untuk menyimpan file PDF.

6. **Halaman About**
   - Menampilkan foto developer.
   - Menampilkan nama dan NIM.
   - Menampilkan tanggal pembuatan aplikasi.

---

## Cara Menjalankan

1. Clone repository:

```bash
git clone https://github.com/WildaniDanialNafis/ujian-tpd-wildani.git
cd ujian-tpd-wildani
```

2. Install dependencies PHP:
   
```bash
composer install
```

3. Install dependencies frontend:

```bash
npm install
```

4. Buat file .env:

```bash
cp .env.example .env
```

5. Sesuaikan konfigurasi database di .env:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db-ujian-tpd
DB_USERNAME=adminuser
DB_PASSWORD=adminpassword
```

6. Generate application key:
7. 
```bash
php artisan key:generate
```

7. Migrasi dan seeding database:

```bash
php artisan migrate:fresh --seed

```

8. Compile asset frontend:

```bash
npm run dev
```

9. Jalankan server lokal:
    
```bash
php artisan serve
```

Buka browser: http://localhost:8000
