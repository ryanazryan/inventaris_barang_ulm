<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanBarang extends Model
{
    use HasFactory;

    protected $table = 'pengiriman_barang';

    protected $fillable = [
        'barang_id',
        'ruangan_pengirim_id',
        'ruangan_penerima_id',
        'jumlah',
        'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function ruanganPengirim()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_pengirim_id');
    }

    public function ruanganPenerima()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_penerima_id');
    }
}
