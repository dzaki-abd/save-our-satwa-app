<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create role
        Role::create(['name' => 'admin', 'guard_name' => 'web']);
        Role::create(['name' => 'user', 'guard_name' => 'web']);
        Role::create(['name' => 'superadmin', 'guard_name' => 'web']);

        // User::factory()->create([
        //     'name' => 'User',
        //     'no_hp' => '081234567890',
        //     'email' => 'user@example.com',
        // ])->each(function ($user) {
        //     $user->assignRole(['user']);
        // });

        User::create([
            'name' => 'User',
            'no_hp' => '081234567890',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ])->assignRole(['user']);
        
        User::create([
            'name' => 'Admin',
            'no_hp' => '081234567890',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ])->assignRole(['admin']);
        
        User::create([
            'name' => 'Super Admin',
            'no_hp' => '081234567890',
            'email' => 'super@example.com',
            'password' => bcrypt('password'),
        ])->assignRole(['superadmin', 'admin']);

        $this->call(SatwaSeeder::class);
        $this->call(PelanggaranSeeder::class);
        $this->call(PelaporanSeeder::class);
        $this->call(ArtikelSeeder::class);
    }
}