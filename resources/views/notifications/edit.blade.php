@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-6 max-w-lg">
        <h1 class="text-3xl font-bold mb-6 text-[#002E5B] flex items-center gap-3">
            <i class="fas fa-edit"></i> Melding Bewerken #{{ $notification->id }}
        </h1>

        <form action="{{ route('notifications.update', $notification) }}" method="POST" class="bg-white shadow-md rounded p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="target_group" class="block text-gray-700 font-semibold mb-2">Doelgroep</label>
                <select name="target_group" id="target_group" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="Student" {{ old('target_group', $notification->target_group) == 'Student' ? 'selected' : '' }}>Student</option>
                    <option value="Instructor" {{ old('target_group', $notification->target_group) == 'Instructor' ? 'selected' : '' }}>Instructor</option>
                    <option value="Both" {{ old('target_group', $notification->target_group) == 'Both' ? 'selected' : '' }}>Beide</option>
                </select>
                @error('target_group')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-semibold mb-2">Bericht</label>
                <textarea name="message" id="message" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required>{{ old('message', $notification->message) }}</textarea>
                @error('message')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="notification_type" class="block text-gray-700 font-semibold mb-2">Type Melding</label>
                <select name="notification_type" id="notification_type" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="Sick" {{ old('notification_type', $notification->notification_type) == 'Sick' ? 'selected' : '' }}>Ziek</option>
                    <option value="LessonChange" {{ old('notification_type', $notification->notification_type) == 'LessonChange' ? 'selected' : '' }}>Les Wijziging</option>
                    <option value="LessonCancel" {{ old('notification_type', $notification->notification_type) == 'LessonCancel' ? 'selected' : '' }}>Les Geannuleerd</option>
                    <option value="PickupAddressChange" {{ old('notification_type', $notification->notification_type) == 'PickupAddressChange' ? 'selected' : '' }}>Ophaaladres Wijziging</option>
                    <option value="LessonGoalChange" {{ old('notification_type', $notification->notification_type) == 'LessonGoalChange' ? 'selected' : '' }}>Les Doel Wijziging</option>
                </select>
                @error('notification_type')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-semibold mb-2">Datum</label>
                <input type="date" name="date" id="date" value="{{ old('date', $notification->date) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
                @error('date')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="is_active" class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="is_active" id="is_active" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="1" {{ old('is_active', $notification->is_active) == '1' ? 'selected' : '' }}>Actief</option>
                    <option value="0" {{ old('is_active', $notification->is_active) == '0' ? 'selected' : '' }}>Inactief</option>
                </select>
                @error('is_active')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="note" class="block text-gray-700 font-semibold mb-2">Notitie (optioneel)</label>
                <textarea name="note" id="note" rows="2" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('note', $notification->note) }}</textarea>
            </div>

            <button type="submit" class="bg-[#002E5B] hover:bg-[#001F3F] text-white py-2 px-4 rounded transition duration-200">
                <i class="fas fa-save"></i> Bijwerken
            </button>

            <a href="{{ route('notifications.index') }}" class="ml-4 text-[#002E5B] hover:underline">Annuleren</a>
        </form>
    </div>
@endsection
