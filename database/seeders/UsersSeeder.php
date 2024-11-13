<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Naufal Faiq Azryan',
            'username' => 'naufalazryan',
            'email' => 'naufalazryan05@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1, 
            'ruangan_id' => 1 
        ]);

        User::create([
            'name' => 'Admin Gedung A',
            'username' => 'admingedunga',
            'email' => null,
            'password' => Hash::make('12345678'),
            'role_id' => 1,
            'ruangan_id' => 1 
        ]);

        
        User::create([
            'name' => 'User 1 Gedung A',
            'username' => 'user1gedunga',
            'email' => null,
            'password' => Hash::make('12345678'),
            'role_id' => 2,
            'ruangan_id' => 1 
        ]);
    }
}
