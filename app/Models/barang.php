<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'tabel_barang';
    protected $filled = [
        'nama',
        'qty',
        'kategori_id',
    ];
    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategori_id');
    }
}
