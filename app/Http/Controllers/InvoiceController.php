<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $invoices = [];

        if ($user->hasRole('Instructor')) {
            $invoices = Invoice::with('registration.user')
                ->orderBy('invoice_date', 'desc')
                ->get();
        } elseif ($user->hasRole('Instructor') || $user->hasRole('Student')) {
            $invoices = Invoice::whereHas('registration.user', function ($q) use ($user) {
                $q->where('id', $user->id);
            })->with('registration.user')->get();
        }

        return view('invoices.index', compact('invoices'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
