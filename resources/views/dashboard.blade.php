@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->first_name }}!</h2>

            @role('Owner')
            <p class="text-gray-700">You're logged in as <strong>Owner</strong>. Manage everything here.</p>
            @endrole

            @role('Instructor')
            <p class="text-gray-700">You're logged in as <strong>Instructor</strong>. Check your student progress.</p>
            @endrole

            @role('Student')
            <p class="text-gray-700">You're logged in as <strong>Student</strong>. View your lessons and exams here.</p>
            @endrole
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            @role('Owner')
            <x-dashboard.card title="Users" icon="users" count="{{ \App\Models\User::count() }}" />
            <x-dashboard.card title="Instructors" icon="chalkboard-teacher" count="{{ \App\Models\Instructor::count() }}" />
            <x-dashboard.card title="Students" icon="user-graduate" count="{{ \App\Models\Student::count() }}" />
            <x-dashboard-link route="students.index" label="Manage Students" />
            <x-dashboard-link route="instructors.index" label="Manage Instructors" />
            @endrole

            @role('Instructor')
            <x-dashboard.card title="Scheduled Lessons" icon="car" count="5" />
            <x-dashboard.card title="Assigned Students" icon="user" count="12" />
            <x-dashboard-link route="invoices.index" label="Manage Invoices" />
            <x-dashboard-link route="notifications.index" label="Manage Notifications" />
            @endrole

            @role('Student')
            <x-dashboard.card title="Upcoming Lessons" icon="calendar" count="2" />
            <x-dashboard.card title="Exam Attempts" icon="file-alt" count="1" />
            <x-dashboard-link route="payments.index" label="Manage Payments" />
            @endrole
        </div>

    </div>
@endsection
