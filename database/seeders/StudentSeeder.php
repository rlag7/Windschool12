<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = User::role('Student')->get();

        foreach ($students as $user) {
            Student::create([
                'user_id' => $user->id,
                'reference_number' => 'REL-' . str_pad($user->id, 4, '0', STR_PAD_LEFT),
                'is_active' => true,
                'note' => 'Student record',
            ]);
        }
    }
}
