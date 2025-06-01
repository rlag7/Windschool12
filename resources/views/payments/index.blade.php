@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-6">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">Mijn Betalingen</h1>

        <a href="{{ route('payments.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 mb-6 inline-block">
            Nieuwe Betaling Toevoegen
        </a>

        @if(session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if($payments->count())
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-blue-600 text-white text-sm">
                    <tr>
                        {{-- ID kolom verwijderd --}}
                        <th class="px-6 py-4 text-left">Factuurnummer</th>
                        <th class="px-6 py-4 text-left">Datum</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Opmerking</th>
                        <th class="px-6 py-4 text-left">Acties</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @foreach($payments as $payment)
                        <tr class="border-t hover:bg-gray-50">
                            {{-- ID cel verwijderd --}}
                            <td class="px-6 py-4">{{ $payment->invoice->invoice_number }}</td>
                            <td class="px-6 py-4">{{ $payment->date->format('d-m-Y') }}</td>
                            <td class="px-6 py-4">{{ $payment->status }}</td>
                            <td class="px-6 py-4">{{ $payment->note ?? '-' }}</td>
                            <td class="px-6 py-4 space-x-2 whitespace-nowrap">
                                <a href="{{ route('payments.show', $payment) }}" class="text-blue-600 hover:text-blue-800 transition duration-200">Bekijk</a>
                                <a href="{{ route('payments.edit', $payment) }}" class="text-yellow-600 hover:text-yellow-800 transition duration-200">Bewerk</a>

                                <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="inline" onsubmit="return confirm('Weet je zeker dat je deze betaling wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition duration-200 bg-transparent border-none cursor-pointer p-0">
                                        Verwijder
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $payments->links() }}
                </div>
            </div>
        @else
            <p class="text-gray-600 text-center py-12">Nog geen betalingen gevonden.</p>
        @endif
    </div>

    <script>
        // Laat de succesmelding 3 seconden zien, daarna verdwijnt die langzaam
        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if(msg) {
                msg.style.transition = 'opacity 0.5s ease';
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 500);
            }
        }, 3000);
    </script>
@endsection
