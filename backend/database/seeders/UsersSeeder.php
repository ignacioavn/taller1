<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ignacio',
            'lastname' => 'Avendaño',
            'rut' => '20.545.216-8',
            'email' => 'ignacio.avendano@alumnos.ucn.cl',
            'points' => 1000,
        ]);
        User::create([
            'name' => 'Alejandra',
            'lastname' => 'López',
            'rut' => '12.345.678-9',
            'email' => 'alejandra.lopez@example.com',
            'points' => 500,
        ]);
        User::create([
            'name' => 'Juan',
            'lastname' => 'Pérez',
            'rut' => '23.456.789-0',
            'email' => 'juan.perez@example.com',
            'points' => 500,
        ]);
        User::create([
            'name' => 'María',
            'lastname' => 'Rodríguez',
            'rut' => '34.567.890-1',
            'email' => 'maria.rodriguez@example.com',
            'points' => 500,
        ]);
        User::create([
            'name' => 'Carlos',
            'lastname' => 'González',
            'rut' => '45.678.901-2',
            'email' => 'carlos.gonzalez@example.com',
            'points' => 500,
        ]);
    }
}
