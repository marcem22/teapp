<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        fake()->seed(10);   // Esto es para generar siempre los mismos datos
        $this->call(PermissionsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PatientSeeder::class);
    }
}
