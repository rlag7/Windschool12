<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Overzicht van betalingen van ingelogde student
    public function index()
    {
        $student = auth()->user()->student;

        if (!$student) {
            abort(403, 'Geen toegang');
        }

        $payments = Payment::whereHas('invoice.registration', function($query) use ($student) {
            $query->where('student_id', $student->id);
        })->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('payments.index', compact('payments'));
    }

    // Formulier om nieuwe betaling aan te maken
    public function create()
    {
        $student = auth()->user()->student;

        $invoices = Invoice::whereHas('registration', function($query) use ($student) {
            $query->where('student_id', $student->id);
        })
            ->where('status', 'Paid')
            ->get();

        return view('payments.create', compact('invoices'));
    }

    // Opslaan van nieuwe betaling
    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'date'       => 'required|date',
            'status'     => 'required|string',
            'note'       => 'nullable|string',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Betaling succesvol toegevoegd.');
    }

    // Detailpagina betaling
    public function show(Payment $payment)
    {
        $this->authorizePaymentAccess($payment);

        return view('payments.show', compact('payment'));
    }

    // Formulier om betaling te bewerken
    public function edit(Payment $payment)
    {
        $this->authorizePaymentAccess($payment);

        $student = auth()->user()->student;

        $invoices = Invoice::whereHas('registration', function($query) use ($student) {
            $query->where('student_id', $student->id);
        })->get();

        return view('payments.edit', compact('payment', 'invoices'));
    }

    // Bijwerken van betaling
    public function update(Request $request, Payment $payment)
    {
        $this->authorizePaymentAccess($payment);

        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'date'       => 'required|date',
            'status'     => 'required|string',
            'note'       => 'nullable|string',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Betaling succesvol bijgewerkt.');
    }

    // Verwijderen van betaling
    public function destroy(Payment $payment)
    {
        $this->authorizePaymentAccess($payment);

        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Betaling succesvol verwijderd.');
    }

    // Controleer of student eigenaar is van betaling
    private function authorizePaymentAccess(Payment $payment)
    {
        $student = auth()->user()->student;

        if (!$student || $payment->invoice->registration->student_id !== $student->id) {
            abort(403, 'Geen toegang tot deze betaling.');
        }
    }
}
