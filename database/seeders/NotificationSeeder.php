<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Notification::create([
                'user_id' => $user->id,
                'target_group' => 'Both', // must match enum exactly
                'message' => 'Welcome notification for ' . $user->username,
                'notification_type' => 'LessonChange', // match enum value exactly
                'date' => now(),
                'is_active' => true,
                'note' => 'Initial notification',
            ]);
        }
    }
}
