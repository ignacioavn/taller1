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
            'rut' => '20.545.217-8',
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
        User::create([
            'name' => 'John',
            'lastname' => 'Doe',
            'rut' => '55.555.555-5',
            'email' => 'john.doe@example.com',
            'points' => 600,
        ]);
        User::create([
            'name' => 'Jane',
            'lastname' => 'Smith',
            'rut' => '66.666.666-6',
            'email' => 'jane.smith@example.com',
            'points' => 700,
        ]);
        User::create([
            'name' => 'Robert',
            'lastname' => 'Johnson',
            'rut' => '77.777.777-7',
            'email' => 'robert.johnson@example.com',
            'points' => 800,
        ]);
        User::create([
            'name' => 'Emily',
            'lastname' => 'Williams',
            'rut' => '88.888.888-8',
            'email' => 'emily.williams@example.com',
            'points' => 900,
        ]);
        User::create([
            'name' => 'Daniel',
            'lastname' => 'Taylor',
            'rut' => '99.999.999-9',
            'email' => 'daniel.taylor@example.com',
            'points' => 550,
        ]);
        User::create([
            'name' => 'Sophia',
            'lastname' => 'Miller',
            'rut' => '112.112.112-0',
            'email' => 'sophia.miller@example.com',
            'points' => 780,
        ]);
        User::create([
            'name' => 'Ethan',
            'lastname' => 'Clark',
            'rut' => '123.123.123-1',
            'email' => 'ethan.clark@example.com',
            'points' => 620,
        ]);
        User::create([
            'name' => 'Olivia',
            'lastname' => 'Lewis',
            'rut' => '134.134.134-2',
            'email' => 'olivia.lewis@example.com',
            'points' => 830,
        ]);
        User::create([
            'name' => 'Michael',
            'lastname' => 'Moore',
            'rut' => '145.145.145-3',
            'email' => 'michael.moore@example.com',
            'points' => 710,
        ]);
        User::create([
            'name' => 'Ava',
            'lastname' => 'Scott',
            'rut' => '156.156.156-4',
            'email' => 'ava.scott@example.com',
            'points' => 590,
        ]);
    }
}
