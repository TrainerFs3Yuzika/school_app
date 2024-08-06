<?php

namespace App\Http\Controllers;

use App\Models\Lessons;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lessons::with(['subject', 'teacher', 'students'])->get();
        return view('lessons.index', compact('lessons'))->with('success', 'Data berhasil ditampilkan.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::pluck('subject_name', 'id');
        $classes = ClassModel::pluck('class_name', 'id');
        $teachers = Teacher::pluck('full_name', 'id');
        $students = Student::pluck('first_name', 'id');
        return view('lessons.create', compact('subjects', 'classes', 'teachers', 'students'))->with('success', 'Data berhasil ditambah.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject_id'    => 'required|exists:subjects,id',
            'class'         => 'required',
            'class_type'    => 'required',
            'days'          => 'required',
            'time_start'    => 'required',
            'time_end'      => 'required',
            'teacher_id'    => 'required|exists:teachers,id',
            'student_ids'   => 'required|array|exists:students,id'
        ]);

        $lessonsModel = new Lessons();
        $lessonsModel->subject_id = $validatedData['subject_id'];
        $lessonsModel->class = $validatedData['class'];
        $lessonsModel->class_type = $validatedData['class_type'];
        $lessonsModel->days = $validatedData['days'];
        $lessonsModel->time_start = $validatedData['time_start'];
        $lessonsModel->time_end = $validatedData['time_end'];
        $lessonsModel->teacher_id = $validatedData['teacher_id'];
        $lessonsModel->save();

        $lessonsModel->students()->sync($validatedData['student_ids']);

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implementation if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lesson = Lessons::findOrFail($id);
        $subjects = Subject::pluck('subject_name', 'id');
        $teachers = Teacher::pluck('full_name', 'id');
        $students = Student::pluck('first_name', 'id');
        $classes = ClassModel::pluck('class_name', 'id');
        return view('lessons.edit', compact('lesson', 'subjects', 'teachers', 'students', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subject_id'    => 'required|exists:subjects,id',
            'class'         => 'required',
            'class_type'    => 'required',
            'days'          => 'required',
            'time_start'    => 'required',
            'time_end'      => 'required',
            'teacher_id'    => 'required|exists:teachers,id',
            'student_ids'   => 'required|array|exists:students,id'
        ]);

        $lesson = Lessons::findOrFail($id);
        $lesson->subject_id = $validatedData['subject_id'];
        $lesson->class = $validatedData['class'];
        $lesson->class_type = $validatedData['class_type'];
        $lesson->days = $validatedData['days'];
        $lesson->time_start = $validatedData['time_start'];
        $lesson->time_end = $validatedData['time_end'];
        $lesson->teacher_id = $validatedData['teacher_id'];
        $lesson->save();

        $lesson->students()->sync($validatedData['student_ids']);

        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lessons = Lessons::findOrFail($id);
        $lessons->students()->detach(); // Detach students before deleting the lesson
        $lessons->delete();
        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully!');
    }
}
