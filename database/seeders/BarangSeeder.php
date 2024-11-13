<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'kode_barang' => 'GAL1R1B1',
            'nama' => 'Laptop',
            'merk' => 'Lenovo',
            'harga' => 10000000,
            'jumlah' => 5,
            'tipe_jumlah' => 'unit',
            'ruangan_id' => 1,
        ]);

        Barang::create([
            'kode_barang' => 'GAL1R1B2',
            'nama' => 'AC',
            'merk' => 'Panasonic',
            'harga' => 2000000,
            'jumlah' => 5,
            'tipe_jumlah' => 'unit',
            'ruangan_id' => 2,
        ]);

        Barang::create([
            'kode_barang' => 'GBL1R1B1',
            'nama' => 'Monitor',
            'merk' => 'Asus',
            'harga' => 1500000,
            'jumlah' => 10,
            'tipe_jumlah' => 'unit',
            'ruangan_id' => 3,
        ]);
    }
}
