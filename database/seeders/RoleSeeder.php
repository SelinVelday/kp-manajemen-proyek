<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar role yang sesuai dengan revisi dosen
        $roles = [
            ['id' => 1, 'name' => 'Project Manager'],
            ['id' => 2, 'name' => 'Team Member'],
            ['id' => 3, 'name' => 'Stakeholder'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['id' => $role['id']], // Cek apakah ID ini sudah ada
                ['name' => $role['name']] // Jika belum, buat dengan nama ini
            );
        }
    }
}