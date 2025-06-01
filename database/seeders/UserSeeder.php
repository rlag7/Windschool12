<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $john = User::create([
            'first_name' => 'John',
            'middle_name' => '',
            'last_name' => 'Doe',
            'birth_date' => '1990-01-01',
            'username' => 'john.doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 1',
        ]);
        $john->assignRole('Owner');

        $jane = User::create([
            'first_name' => 'Jane',
            'middle_name' => 'van',
            'last_name' => 'Dijk',
            'birth_date' => '1995-05-15',
            'username' => 'jane.dijk',
            'email' => 'jane@example.com',
            'password' => bcrypt('secret'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 2',
        ]);
        $jane->assignRole('Student');

        $mark = User::create([
            'first_name' => 'Mark',
            'middle_name' => '',
            'last_name' => 'Smith',
            'birth_date' => '1985-10-20',
            'username' => 'mark.smith',
            'email' => 'mark@example.com',
            'password' => bcrypt('password123'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 3',
        ]);
        $mark->assignRole('Instructor');
    }
}
