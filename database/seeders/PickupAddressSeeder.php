<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PickupAddress;

class PickupAddressSeeder extends Seeder
{
    public function run(): void
    {
        $addresses = [
            ['street_name' => 'Oak Street', 'house_number' => '12', 'addition' => '', 'postal_code' => '5678CD', 'city' => 'Rotterdam', 'is_active' => true, 'note' => 'Home address'],
            ['street_name' => 'Pine Avenue', 'house_number' => '45', 'addition' => 'B', 'postal_code' => '9012EF', 'city' => 'Utrecht', 'is_active' => true, 'note' => 'Work address'],
        ];

        foreach ($addresses as $address) {
            PickupAddress::create($address);
        }
    }
}
