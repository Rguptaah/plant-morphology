<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Administrator',
                'slug' => 'admin',
                'description' => 'System administrator with full access'
            ],
            [
                'name' => 'Botanist',
                'slug' => 'botanist',
                'description' => 'Can add and edit plant information'
            ],
            [
                'name' => 'Reviewer',
                'slug' => 'reviewer',
                'description' => 'Can review and approve plant submissions'
            ],
            [
                'name' => 'User',
                'slug' => 'user',
                'description' => 'Regular user with limited access'
            ],
            [
                'name' => 'Practitioner',
                'slug' => 'practitioner',
                'description' => 'Can submit queries and access advanced features'
            ],
            [
                'name' => 'Student',
                'slug' => 'student',
                'description' => 'Can access educational resources and submit queries'
            ],
            [
                'name' => 'Researcher',
                'slug' => 'researcher',
                'description' => 'Can access research materials and submit queries'
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
                'description' => 'Miscellaneous role for special cases'
            ]

        ];

        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
