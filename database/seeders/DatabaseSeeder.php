<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear ADMIN del sistema
        $this->call(AdminSeeder::class);

        // (Opcional) Usuarios de prueba
        // \App\Models\User::factory(5)->create();
    }
}
