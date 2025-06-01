<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            ['brand' => 'Toyota', 'model' => 'Corolla', 'license_plate' => 'ABC-123', 'fuel_type' => 'gasoline', 'is_active' => true, 'note' => 'Company car 1'],
            ['brand' => 'Tesla', 'model' => 'Model 3', 'license_plate' => 'TES-456', 'fuel_type' => 'electric', 'is_active' => true, 'note' => 'Electric car'],
            ['brand' => 'Volkswagen', 'model' => 'Golf', 'license_plate' => 'VWG-789', 'fuel_type' => 'gasoline', 'is_active' => true, 'note' => 'Company car 2'],
            ['brand' => 'Ford', 'model' => 'Focus', 'license_plate' => 'FDS-101', 'fuel_type' => 'gasoline', 'is_active' => true, 'note' => 'Company car 3'],
            ['brand' => 'BMW', 'model' => 'i3', 'license_plate' => 'BMW-202', 'fuel_type' => 'electric', 'is_active' => true, 'note' => 'Electric car 2'],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}

