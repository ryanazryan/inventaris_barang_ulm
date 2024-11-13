<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';

    protected $fillable = [
        'lantai_id',
        'kode_ruangan',
    ];

    public function lantai()
    {
        return $this->belongsTo(Lantai::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
