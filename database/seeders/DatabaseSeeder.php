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
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'rahul.ccras1511@gmail.com',
            'password' => 'Rahul@12345'
        ]);
        User::factory()->create([
            'name' => 'User 1',
            'email' => 'practitioner@example.com',
            'password' => 'practitioner@12345'
        ]);
        User::factory()->create([
            'name' => 'User 2',
            'email' => 'student@example.com',
            'password' => 'student@12345'
        ]);
        User::factory()->create([
            'name' => 'User 3',
            'email' => 'botanist@example.com',
            'password' => 'botanist@12345'
        ]);
        User::factory()->create([
            'name' => 'User 4',
            'email' => 'researcher@example.com',
            'password' => 'researcher@12345'
        ]);
        User::factory()->create([
            'name' => 'User 5',
            'email' => 'other@example.com',
            'password' => 'other@12345'
        ]);
        User::factory()->create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
            'password' => 'guest@12345'
        ]);
    }
}
