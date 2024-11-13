<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gedung;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gedung::create(['nama_gedung' => 'Gedung A']);
        Gedung::create(['nama_gedung' => 'Gedung B']);
        Gedung::create(['nama_gedung' => 'Gedung C']);
    }
}
