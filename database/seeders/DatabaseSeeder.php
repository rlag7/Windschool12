<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,                // Roles first, so you can assign roles to users
            UserSeeder::class,                // Users before Contacts, Students, Instructors
            ContactSeeder::class,             // Contacts depend on Users
            StudentSeeder::class,             // Students depend on Users
            InstructorSeeder::class,          // Instructors depend on Users
            NotificationSeeder::class,        // Notifications depend on Users
            CarSeeder::class,                 // Cars independent, but needed for Driving Lessons
            PackageSeeder::class,             // Packages independent, needed for Registrations
            RegistrationSeeder::class,        // Registrations depend on Students and Packages
            DrivingLessonSeeder::class,       // Driving lessons depend on Registrations, Instructors, Cars
            PickupAddressSeeder::class,       // Pickup Addresses independent
            DrivingLessonPickupAddressSeeder::class, // Depends on Driving Lessons and Pickup Addresses
            ExamSeeder::class,                // Exams depend on Registrations and Instructors
            InvoiceSeeder::class,             // Invoices depend on Registrations
            PaymentSeeder::class,             // Payments depend on Invoices
        ]);
    }
}
