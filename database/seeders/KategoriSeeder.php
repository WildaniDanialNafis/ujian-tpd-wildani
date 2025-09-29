<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $kategoriList = [
            [
                'nama_kategori' => 'Undangan',
                'keterangan'    => 'Kategori untuk surat undangan'
            ],
            [
                'nama_kategori' => 'Pengumuman',
                'keterangan'    => 'Kategori untuk surat pengumuman'
            ],
            [
                'nama_kategori' => 'Nota Dinas',
                'keterangan'    => 'Kategori untuk nota dinas'
            ],
            [
                'nama_kategori' => 'Pemberitahuan',
                'keterangan'    => 'Kategori untuk surat pemberitahuan'
            ],
        ];

        foreach ($kategoriList as $kategori) {
            Kategori::create($kategori);
        }
    }
}
