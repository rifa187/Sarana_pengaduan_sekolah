<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        $adminRole = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $studentRole = \Spatie\Permission\Models\Role::create(['name' => 'siswa']);

        // Create Admin User
        $admin = User::create([
            'nis' => 'admin', // Admin NIS for login
            'name' => 'Administrator',
            'email' => 'admin@school.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole);

        // Create Student User
        $student = User::create([
            'nis' => '12345678',
            'name' => 'Siswa Demo',
            'email' => 'siswa@school.com',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'RPL',
            'no_hp' => '081234567890',
            'role' => 'siswa',
            'password' => bcrypt('password'),
        ]);
        $student->assignRole($studentRole);
    }
}
