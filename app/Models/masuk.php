<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masuk extends Model
{
    use HasFactory;
    protected $table = 'tabel_barang_masuk';
    protected $filled = [
        'tanggal_masuk',
        'jumlah',
        'id_barang',
    ];
    public function barang()
    {
        return $this->belongsTo(barang::class, 'id_barang');
    }
}
