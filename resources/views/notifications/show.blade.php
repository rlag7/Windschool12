@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-6 max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-[#002E5B] flex items-center gap-3">
            <i class="fas fa-info-circle"></i> Melding Details #{{ $notification->id }}
        </h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="w-full text-gray-700">
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">Type</th>
                    <td class="py-2">{{ $notification->notification_type }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">Bericht</th>
                    <td class="py-2">{{ $notification->message }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">Doelgroep</th>
                    <td class="py-2">{{ $notification->target_group }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">Datum</th>
                    <td class="py-2">{{ \Carbon\Carbon::parse($notification->date)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th class="py-2 text-left font-semibold">Status</th>
                    <td class="py-2">{{ $notification->is_active ? 'Actief' : 'Inactief' }}</td>
                </tr>
            </table>

            <a href="{{ route('notifications.index') }}" class="inline-block mt-6 text-[#002E5B] hover:underline">
                <i class="fas fa-arrow-left"></i> Terug naar overzicht
            </a>
        </div>
    </div>
@endsection
