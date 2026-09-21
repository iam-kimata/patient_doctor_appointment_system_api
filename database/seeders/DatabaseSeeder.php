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
            'full_name' => 'System Admin',
            'phone_number' => '0700000000',
            'email' => 'admin@gmail.com',
            'password' => 'Admin@123',
            'role' => 'Admin',
        ]);
    }
}
