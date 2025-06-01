<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $students = Student::with('user', 'registrations.drivingLessons', 'registrations.instructor.user', 'registrations.exams')->get();

            if ($students->isEmpty()) {
                // Pass empty collection or null explicitly to view
                return view('students.index', ['students' => collect()]);
            }

            return view('students.index', ['students' => $students]);

        } catch (\Exception $e) {
            // Pass an error message or empty collection so the view can handle it gracefully
            return view('students.index', [
                'students' => collect(),
                'error' => 'Er is een fout opgetreden bij het laden van de leerlingen: ' . $e->getMessage()
            ]);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
