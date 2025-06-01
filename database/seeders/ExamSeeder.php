<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exam;
use App\Models\Registration;
use App\Models\Instructor;

class ExamSeeder extends Seeder
{
    public function run(): void
    {
        $registrations = Registration::all();
        $instructors = Instructor::all();

        foreach ($registrations as $registration) {
            Exam::create([
                'registration_id' => $registration->id,
                'instructor_id' => $instructors->random()->id,
                'start_date' => now()->addDays(rand(1, 60)),
                'start_time' => now()->addHours(rand(1, 3))->format('H:i:s'),
                'end_date' => now()->addDays(rand(1, 60))->addHours(2),
                'end_time' => now()->addHours(rand(3, 5))->format('H:i:s'),
                'location' => 'Driving Test Center',
                'result' => ['Passed', 'Failed'][array_rand(['Passed', 'Failed'])],
                'is_active' => true,
                'comment' => 'First exam attempt',
            ]);
        }
    }
}
