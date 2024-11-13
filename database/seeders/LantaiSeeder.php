<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lantai;

class LantaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lantai::create([
            'nomor_lantai' => 'Lantai 1',
            'gedung_id' => 1, 
        ]);

        Lantai::create([
            'nomor_lantai' => 'Lantai 2',
            'gedung_id' => 1,
        ]);
        Lantai::create([
            'nomor_lantai' => 'Lantai 3',
            'gedung_id' => 1, 
        ]);

        Lantai::create([
            'nomor_lantai' => 'Lantai 1',
            'gedung_id' => 2,
        ]);
        Lantai::create([
            'nomor_lantai' => 'Lantai 2',
            'gedung_id' => 2, 
        ]);

        Lantai::create([
            'nomor_lantai' => 'Lantai 3',
            'gedung_id' => 2,
        ]);
        Lantai::create([
            'nomor_lantai' => 'Lantai 1',
            'gedung_id' => 3, 
        ]);

        Lantai::create([
            'nomor_lantai' => 'Lantai 2',
            'gedung_id' => 3,
        ]);

        Lantai::create([
            'nomor_lantai' => 'Lantai 3',
            'gedung_id' => 3,
        ]);

    }
}