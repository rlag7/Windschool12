<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            ['type' => 'Package1', 'lesson_count' => 10, 'price_per_lesson' => 30.0, 'is_active' => true, 'note' => 'Basic package'],
            ['type' => 'Package2', 'lesson_count' => 20, 'price_per_lesson' => 28.0, 'is_active' => true, 'note' => 'Standard package'],
            ['type' => 'Package3', 'lesson_count' => 30, 'price_per_lesson' => 25.0, 'is_active' => true, 'note' => 'Premium package'],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
