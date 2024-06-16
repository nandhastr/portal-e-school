<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Andi',
            'email' => 'andi@example.com',
            'password' => Hash::make('123'),
            'role' => 'siswa',
        ]);
        User::create([
            'name' => 'Randi',
            'email' => 'randi@example.com',
            'password' => Hash::make('123'),
            'role' => 'siswa',
        ]);
        User::create([
            'name' => 'guru',
            'email' => 'guru@example.com',
            'password' => Hash::make('123'),
            'role' => 'guru',
        ]);
    }
}
