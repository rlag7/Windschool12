<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\Registration;
use Illuminate\Support\Str;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $registrations = Registration::all();

        foreach ($registrations as $registration) {
            // Ensure 10-15 invoices per registration
            $invoiceCount = rand(10, 15);

            for ($i = 0; $i < $invoiceCount; $i++) {
                $amountExclVat = $faker->numberBetween(100, 1000);
                $vat = round($amountExclVat * 0.21, 2);
                $amountInclVat = $amountExclVat + $vat;

                Invoice::create([
                    'registration_id' => $registration->id,
                    'invoice_number' => 'INV-' . strtoupper(Str::random(6)) . '-' . $registration->id,
                    'invoice_date' => $faker->dateTimeBetween('-1 year', 'now'),
                    'amount_excl_vat' => $amountExclVat,
                    'vat' => $vat,
                    'amount_incl_vat' => $amountInclVat,
                    'status' => $faker->randomElement(['Open', 'Paid', 'Overdue']),
                    'is_active' => $faker->boolean(95),
                    'note' => $faker->sentence(),
                ]);
            }
        }
    }
}
