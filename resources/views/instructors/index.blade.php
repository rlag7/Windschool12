@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Overzicht Instructeurs</h1>

        @if($instructors->isEmpty())
            <div class="bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 rounded">
                Er zijn momenteel geen instructeurs geregistreerd.
            </div>
        @else
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contactgegevens</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Geplande Lessen</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notitie</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($instructors as $instructor)
                        @php
                            $plannedLessons = $instructor->drivingLessons->where('start_time', '>', now())->count();
                        @endphp
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">
                                {{ $instructor->user->full_name ?? 'Onbekend' }}
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900">
                                @if($instructor->user->address)
                                    {{ $instructor->user->address }}<br>
                                @endif

                                @if($instructor->user->email)
                                    {{ $instructor->user->email }}<br>
                                @endif

                                @if($instructor->user->phone)
                                    {{ $instructor->user->phone }}
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium
                                    {{ $instructor->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $instructor->is_active ? 'Actief' : 'Ziek' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900">
                                {{ $plannedLessons }}
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-700">
                                {{ $instructor->note ?? 'Onbekend' }}
                            </td>
                            <td class="px-4 py-3">
                                {{-- Actions can go here --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
