<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DrivingLesson;
use App\Models\Registration;
use App\Models\Instructor;
use App\Models\Car;

class DrivingLessonSeeder extends Seeder
{
    public function run(): void
    {
        $registrations = Registration::all();
        $instructors = Instructor::all();
        $cars = Car::all();

        foreach ($registrations as $registration) {
            DrivingLesson::create([
                'registration_id' => $registration->id,
                'instructor_id' => $instructors->random()->id,
                'car_id' => $cars->random()->id,
                'start_date' => now()->subDays(rand(1, 30)),
                'start_time' => now()->subHours(rand(1, 5))->format('H:i:s'),
                'end_date' => now()->addDays(rand(1, 30)),
                'end_time' => now()->addHours(rand(1, 5))->format('H:i:s'),
                'lesson_status' => 'Scheduled',
                'goal' => 'Basic driving skills',
                'student_comment' => 'Looking forward',
                'instructor_comment' => 'Good progress',
                'is_active' => true,
                'comment' => 'Initial driving lesson',
            ]);
        }
    }
}
