<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classs;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('classs')->paginate(5);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classs::all();
        return view('students.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_code' => 'required|unique:students',
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable',
            'date_of_birth' => 'nullable|date',
            'class_id' => 'required|exists:classes,id',
            'gender' => 'required|in:Nam,Nữ,Khác',
            'status' => 'required|in:Đang học,Nghỉ học,Tốt nghiệp',
        ]);
  
        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('classs')->findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $classes = Classs::all();
        return view('students.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $student = Student::findOrFail($id);

        $request->validate([
            'student_code' => 'required|unique:students,student_code,' . $id,
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'nullable',
            'date_of_birth' => 'nullable|date',
            'class_id' => 'required|exists:classes,id',
            'gender' => 'required|in:Nam,Nữ,Khác',
            'status' => 'required|in:Đang học,Nghỉ học,Tốt nghiệp',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}