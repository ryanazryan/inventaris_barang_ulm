<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), 
        ]);

        $this->call([
            GedungSeeder::class,  
            LantaiSeeder::class,  
            RuanganSeeder::class,
            BarangSeeder::class,
        ]);
    }
}
