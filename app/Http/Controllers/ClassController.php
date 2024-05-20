<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Teacher;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::with(['student', 'teacher'])->get();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        return view('classes.create', compact('students', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $newClass = ClassModel::create([
            'class_name' => $request->class_name,
            'student_id' => $request->student_id,
            'teacher_id' => $request->teacher_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        if ($newClass) {
            return redirect()->route('home')->with('success', 'Kelas berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan kelas, silakan coba lagi');
        }
    }

    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        $students = Student::all();
        $teachers = Teacher::all();
        return view('classes.edit', compact('class', 'students', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_name' => 'required',
            'student_id' => 'required|exists:students,id',
            'teacher_id' => 'required|exists:teachers,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $class = ClassModel::findOrFail($id);

        $class->update([
            'class_name' => $request->class_name,
            'student_id' => $request->student_id,
            'teacher_id' => $request->teacher_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('home')->with('success', 'Kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();

        return redirect()->route('home')->with('success', 'Kelas berhasil dihapus');
    }
}
