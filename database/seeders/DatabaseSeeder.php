<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Test',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'no_hp' => '081200000000',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Customer Test',
            'email' => 'customer@example.com',
            'password' => Hash::make('12345678'),
            'no_hp' => '081200000000',
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);
    }
}
