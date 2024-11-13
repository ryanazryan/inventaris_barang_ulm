<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{
    protected $table = 'lantai';

    protected $fillable = [
        'gedung_id',
        'nomor_lantai',
    ];

    // Relasi dengan gedung
    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    public function ruangan()
    {
        return $this->hasMany(Ruangan::class);
    }

    
}
