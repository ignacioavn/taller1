<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'username' => 'Ochietto',
            'password' => bcrypt('Jaqamain3pals'),
            'role' => 'admin',
        ]);
    }
}
