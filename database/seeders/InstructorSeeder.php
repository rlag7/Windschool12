<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;
use App\Models\User;

class InstructorSeeder extends Seeder
{
    public function run(): void
    {
        // Get only 5 users with the 'Instructor' role
        $instructors = User::role('Instructor')->take(5)->get();

        foreach ($instructors as $user) {
            Instructor::create([
                'user_id' => $user->id,
                'number' => 'INS-' . str_pad($user->id, 4, '0', STR_PAD_LEFT),
                'is_active' => true,
                'note' => 'Instructor record',
            ]);
        }
    }
}
