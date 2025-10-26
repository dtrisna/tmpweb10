<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Dina',
            'password' => Hash::make('dinaa'), 
            'nohp' => '081515403340',
            'role' => 'karyawan'
        ]);
        User::create([
            'name' => 'Wawa',
            'password' => Hash::make('najwa123'), 
            'nohp' => '085730709558',
            'role' => 'customer'
        ]);
    }
}
