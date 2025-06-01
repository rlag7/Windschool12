<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['Student', 'Instructor', 'Owner']; // Roles in English
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}
