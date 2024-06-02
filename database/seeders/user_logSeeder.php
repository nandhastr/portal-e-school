<?php

namespace Database\Seeders;

use App\Models\user_logs;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class user_logSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user_logs::create([
            'user_id' => 1,
            'action' => 'Logged in',
            'description' => 'User logged into the system.',
        ]);
    }
}
