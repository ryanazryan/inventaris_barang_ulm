<?php

namespace Database\Seeders;

use App\Models\Gedung;
use App\Models\Lantai;
use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GedungLantaiRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gedung = Gedung::create([
            'nama_gedung' => 'Gedung A'
        ]);

        $lantai = Lantai::create([
            'gedung_id' => $gedung->id,
            'nomor_lantai' => 'Lantai 1'
        ]);

        Ruangan::create([
            'lantai_id' => $lantai->id,
            'kode_ruangan' => 'A101'
        ]);
    }
}
