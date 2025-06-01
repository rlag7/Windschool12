@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-6 max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-[#002E5B] flex items-center gap-3">
            <i class="fas fa-info-circle"></i> Betaling Details #{{ $payment->id }}
        </h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="w-full text-gray-700">
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">ID</th>
                    <td class="py-2">{{ $payment->id }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">Factuurnummer</th>
                    <td class="py-2">{{ $payment->invoice->invoice_number }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">Datum</th>
                    <td class="py-2">{{ $payment->date->format('d-m-Y') }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">Status</th>
                    <td class="py-2">
                        @if($payment->status === 'Betaald')
                            <span class="text-green-600 font-semibold"><i class="fas fa-check-circle"></i> Betaald</span>
                        @elseif($payment->status === 'In Afwachting')
                            <span class="text-yellow-600 font-semibold"><i class="fas fa-clock"></i> In Afwachting</span>
                        @else
                            <span class="text-red-600 font-semibold"><i class="fas fa-times-circle"></i> Geannuleerd</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="py-2 text-left font-semibold">Opmerking</th>
                    <td class="py-2">{{ $payment->note ?? '-' }}</td>
                </tr>
            </table>

            <a href="{{ route('payments.index') }}" class="inline-block mt-6 text-[#002E5B] hover:underline">
                <i class="fas fa-arrow-left"></i> Terug naar overzicht
            </a>
        </div>
    </div>
@endsection
