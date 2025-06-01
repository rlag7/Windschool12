@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-6 max-w-lg">
        <h1 class="text-3xl font-bold mb-6 text-[#002E5B] flex items-center gap-3">
            <i class="fas fa-edit"></i> Betaling Bewerken #{{ $payment->id }}
        </h1>

        <form action="{{ route('payments.update', $payment) }}" method="POST" class="bg-white shadow-md rounded p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="invoice_id" class="block text-gray-700 font-semibold mb-2">Factuurnummer</label>
                <select name="invoice_id" id="invoice_id" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#002E5B]">
                    <option value="">-- Kies een factuur --</option>
                    @foreach($invoices as $invoice)
                        <option value="{{ $invoice->id }}" {{ (old('invoice_id', $payment->invoice_id) == $invoice->id) ? 'selected' : '' }}>
                            {{ $invoice->invoice_number }}
                        </option>
                    @endforeach
                </select>
                @error('invoice_id')
                <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-semibold mb-2">Betalingsdatum</label>
                <input type="date" name="date" id="date" value="{{ old('date', $payment->date->format('Y-m-d')) }}" required
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#002E5B]">
                @error('date')
                <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status" id="status" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#002E5B]">
                    <option value="In Afwachting" {{ old('status', $payment->status) == 'In Afwachting' ? 'selected' : '' }}>In Afwachting</option>
                    <option value="Betaald" {{ old('status', $payment->status) == 'Betaald' ? 'selected' : '' }}>Betaald</option>
                    <option value="Geannuleerd" {{ old('status', $payment->status) == 'Geannuleerd' ? 'selected' : '' }}>Geannuleerd</option>
                </select>
                @error('status')
                <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="note" class="block text-gray-700 font-semibold mb-2">Opmerking (optioneel)</label>
                <textarea name="note" id="note" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#002E5B]">{{ old('note', $payment->note) }}</textarea>
            </div>

            <button type="submit" class="bg-[#002E5B] hover:bg-[#001F3F] text-white font-semibold py-2 px-4 rounded transition duration-200">
                <i class="fas fa-save"></i> Bijwerken
            </button>

            <a href="{{ route('payments.index') }}" class="ml-4 text-[#002E5B] hover:underline">Annuleren</a>
        </form>
    </div>
@endsection
