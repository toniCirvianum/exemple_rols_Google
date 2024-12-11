<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.es',
            'role' => 'admin',
            'password'=> 123
        ]);

        User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@admin.es',
            'role' => 'superadmin',
            'password'=> 123
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@admin.es',
            'role' => 'user',
            'password'=> 123
        ]);
    }
}
