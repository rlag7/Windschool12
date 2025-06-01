<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Invoice;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $invoices = Invoice::where('status', 'Paid')->get();

        foreach ($invoices as $invoice) {
            Payment::create([
                'invoice_id' => $invoice->id,
                'date' => now(),          // or some date logic
                'status' => 'Completed',  // example status
                'is_active' => true,
                'note' => 'Payment received',
            ]);
        }
    }
}

