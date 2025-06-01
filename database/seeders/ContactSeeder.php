<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\User;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Contact::create([
                'user_id' => $user->id,
                'street_name' => 'Main Street',
                'house_number' => '10',
                'addition' => '',
                'postal_code' => '1234AB',
                'city' => 'Amsterdam',
                'mobile' => '0612345678',
                'email' => $user->username . '@example.com',
                'is_active' => true,
                'note' => 'Primary contact information',
            ]);
        }
    }
}
