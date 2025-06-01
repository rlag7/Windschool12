@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Overzicht facturen</h1>

        @if($invoices->isEmpty())
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded flex items-center space-x-2" role="alert">
                <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.366-.446.957-.446 1.323 0l7 8.5c.457.555.05 1.401-.661 1.401H2.08c-.71 0-1.118-.846-.66-1.401l7-8.5zM11 13a1 1 0 11-2 0 1 1 0 012 0zM9 8a1 1 0 012 0v2a1 1 0 01-2 0V8z" clip-rule="evenodd" />
                </svg>
                <span>Er zijn nog geen facturen beschikbaar.</span>
            </div>
        @else
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Factuurnummer</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam Leerling/Instructeur</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bedrag</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($invoices as $invoice)
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $invoice->invoice_number }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ optional($invoice->registration->user)->name ?? 'Onbekend' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $invoice->invoice_date->format('d-m-Y') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">€ {{ number_format($invoice->amount_incl_vat, 2, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium
                                        {{
                                            $invoice->status === 'paid' ? 'bg-green-100 text-green-800' :
                                            ($invoice->status === 'unpaid' ? 'bg-red-100 text-red-800' :
                                            'bg-gray-100 text-gray-800')
                                        }}">
                                        {{ ucfirst($invoice->status) }}
                                    </span>
                            </td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('invoices.show', $invoice) }}" class="inline-flex items-center px-2 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                                    Bekijken
                                </a>
                                <a href="#" class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-800 bg-gray-200 rounded hover:bg-gray-300 transition">
                                    Downloaden
                                </a>
                                <a href="#" class="inline-flex items-center px-2 py-1 text-xs font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600 transition">
                                    Herinnering
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
