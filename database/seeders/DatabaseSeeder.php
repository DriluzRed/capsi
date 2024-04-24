<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $adminUser = User::create([
            'ci' => 0,
            'name' => 'Administrador',
            'email' => 'admin@capsi.com',
            'password' => Hash::make('123456'),
        ]);

        $adminUser->assignRole($adminRole);
    }
}
