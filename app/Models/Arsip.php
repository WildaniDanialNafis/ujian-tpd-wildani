<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'arsip';

    // Primary key
    protected $primaryKey = 'id_arsip';

    // Mass assignable
    protected $fillable = [
        'kategori_id',
        'nomor_surat',
        'judul',
        'file_surat',
    ];

    public $timestamps = true;

    /**
     * Relasi ke kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }
}
