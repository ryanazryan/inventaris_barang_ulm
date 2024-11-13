<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruangan;
use App\Models\Lantai;
use App\Models\Gedung;

class RuanganSeeder extends Seeder
{
    public function run(): void
    {
        // Mendapatkan semua gedung
        $gedungs = Gedung::all();

        foreach ($gedungs as $gedung) {
            // Mendapatkan semua lantai yang ada di gedung ini
            $lantais = Lantai::where('gedung_id', $gedung->id)->get();

            foreach ($lantais as $lantai) {
                // Set jumlah ruangan yang sama untuk setiap lantai
                for ($i = 1; $i <= 4; $i++) { // Anda bisa mengubah angka ini sesuai kebutuhan
                    // Membuat kode ruangan dengan format RUANGANXXGA
                    $kodeRuangan = 'RUANGAN' . str_pad($i, 2, '0', STR_PAD_LEFT) . strtoupper(substr($gedung->nama_gedung, -1)) . strtoupper(substr($lantai->nomor_lantai, -1));

                    // Membuat ruangan baru
                    Ruangan::create([
                        'kode_ruangan' => $kodeRuangan,
                        'lantai_id' => $lantai->id,
                    ]);
                }
                echo "4 ruangan berhasil dibuat untuk Lantai {$lantai->nomor_lantai} di Gedung {$gedung->nama_gedung}.\n";
            }
        }
    }
}
