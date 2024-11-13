<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'kode_barang',
        'nama',
        'merk',
        'harga',
        'jumlah',
        'tipe_jumlah',
        'ruangan_id'
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}
