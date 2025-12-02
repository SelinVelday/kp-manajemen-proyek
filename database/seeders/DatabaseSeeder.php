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
        // Panggil RoleSeeder terlebih dahulu sebelum user atau data lain
        $this->call([
            RoleSeeder::class,
        ]);

        // Contoh: Buat user test setelah role tersedia
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}