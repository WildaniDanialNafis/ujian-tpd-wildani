<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArsipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataArsip = [
            [
                'kategori_id' => 1,
                'nomor_surat' => '2025/PD2/TU/022',
                'judul' => 'Undangan Halal Bi Halal',
                'file_surat' => 'uploads/arsip_1.pdf',
            ],
            [
                'kategori_id' => 2,
                'nomor_surat' => '2025/PD3/TU/001',
                'judul' => 'Nota Dinas WFH',
                'file_surat' => 'uploads/arsip_2.pdf',
            ],
        ];

        foreach ($dataArsip as $arsip) {
            DB::table('arsip')->insert([
                'kategori_id' => $arsip['kategori_id'],
                'nomor_surat' => $arsip['nomor_surat'],
                'judul' => $arsip['judul'],
                'file_surat' => $arsip['file_surat'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
