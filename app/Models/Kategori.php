<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $primaryKey = 'id_kategori';

    public $timestamps = true;

    protected $fillable = [
        'nama_kategori',
        'keterangan'
    ];

    public function arsip() {
        return $this->hasMany(Arsip::class, 'kategori_id', 'id_kategori');
    }
}
