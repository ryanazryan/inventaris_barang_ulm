<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    protected $table = 'gedung';

    protected $fillable = [
        'nama_gedung',
    ];

    public function lantai()
    {
        return $this->hasMany(Lantai::class);
    }
}
