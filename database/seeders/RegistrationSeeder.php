<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;
use App\Models\Student;
use App\Models\Package;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $packages = Package::all();

        foreach ($students as $student) {
            Registration::create([
                'student_id' => $student->id,
                'package_id' => $packages->random()->id,
                'start_date' => now()->subMonths(rand(1, 6)),
                'end_date' => now()->addMonths(rand(1, 6)),
                'is_active' => true,
                'note' => 'Active registration',
            ]);
        }
    }
}
