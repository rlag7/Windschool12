@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-6">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">Mijn Meldingen</h1>

        <a href="{{ route('notifications.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 mb-6 inline-block">
            Nieuwe Melding Toevoegen
        </a>

        @if(session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if($notifications->count())
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-blue-600 text-white text-sm">
                    <tr>
                        <th class="px-6 py-4 text-left">Doelgroep</th>
                        <th class="px-6 py-4 text-left">Bericht</th>
                        <th class="px-6 py-4 text-left">Datum</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Acties</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @foreach($notifications as $notification)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $notification->target_group }}</td>
                            <td class="px-6 py-4">{{ Str::limit($notification->message, 50) }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($notification->date)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4">{{ $notification->is_active ? 'Actief' : 'Inactief' }}</td>
                            <td class="px-6 py-4 space-x-2 whitespace-nowrap">
                                <a href="{{ route('notifications.show', $notification) }}" class="text-blue-600 hover:text-blue-800">Bekijk</a>
                                <a href="{{ route('notifications.edit', $notification) }}" class="text-yellow-600 hover:text-yellow-800">Bewerk</a>
                                <form action="{{ route('notifications.destroy', $notification) }}" method="POST" class="inline" onsubmit="return confirm('Weet je zeker dat je deze melding wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 bg-transparent border-none cursor-pointer p-0">
                                        Verwijder
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">{{ $notifications->links() }}</div>
            </div>
        @else
            <p class="text-gray-600 text-center py-12">Nog geen meldingen gevonden.</p>
        @endif
    </div>

    <script>
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
