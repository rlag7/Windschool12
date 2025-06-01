@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Overzicht Leerlingen</h1>

        @if (!empty($error))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 shadow" role="alert">
                <strong class="font-bold">Fout:</strong>
                <span class="block sm:inline">{{ $error }}</span>
            </div>
        @elseif ($students->isEmpty())
            <div class="bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 rounded">
                Er zijn momenteel geen leerlingen geregistreerd.
            </div>
        @else
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Referentienummer</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lessen (Gevolgd / Gepland)</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lestegoed</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instructeur</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Examenstatus</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notitie</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)
                        @php
                            $lessons = $student->registrations->flatMap->drivingLessons;
                            $lessenGepland = $lessons->where('start_time', '>', now())->count();
                            $lessenGevolgd = $lessons->where('start_time', '<=', now())->count();

                            $lestegoed = $student->registrations->sum('lesson_credit');

                            $instructor = optional($student->registrations->first()->instructor ?? null)?->user->full_name;

                            $exam = $student->registrations->flatMap->exams->sortByDesc('start_date')->first();
                            $examStatus = $exam?->result ?? ($exam ? 'Gepland' : 'Niet gepland');
                        @endphp

                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                {{ $student->user->full_name ?? 'Onbekend' }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                {{ $student->reference_number ?? 'Onbekend' }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                @if($student->user->email)
                                    {{ $student->user->email }}<br>
                                @endif
                                @if($student->user->phone)
                                    {{ $student->user->phone }}<br>
                                @endif
                                @if($student->user->address)
                                    {{ $student->user->address }}
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                {{ $lessenGevolgd }} / {{ $lessenGepland }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                {{ $lestegoed }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                {{ $instructor ?? 'Onbekend' }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                {{ $examStatus ?? 'Onbekend' }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                {{ $student->is_active ? 'Actief' : 'Inactief' }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                {{ $student->note ?: 'Onbekend' }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
