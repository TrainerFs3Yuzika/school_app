<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;

class ScoreController extends Controller
{
    public function index()
    {
        $scores = Score::all();
        return view('scores.index', compact('scores'));
    }

    public function create()
    {
        $teachers = Teacher::pluck('full_name', 'id');
        $students = Student::pluck('first_name', 'id');
        $subjects = Subject::pluck('subject_name', 'id');
        return view('scores.create', compact('teachers', 'students', 'subjects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'teacher_id' => 'required',
            'student_id' => 'required',
            'subject_id' => 'required',
            'score' => 'required',
        ]);

        $score = new Score();
        $score->teacher_id = $request->teacher_id;
        $score->student_id = $request->student_id;
        $score->subject_id = $request->subject_id;
        $score->score = $request->score;
        $score->save();

        return redirect()->route('scores.index')->with('success', 'Score created successfully.');
    }
    public function show($id)
    {
        $score = Score::findOrFail($id);
        return view('scores.show', compact('score'));
    }

    public function edit($id)
    {
        $score = Score::findOrFail($id);
        $teachers = Teacher::pluck('full_name', 'id');
        $students = Student::pluck('first_name', 'id');
        $subjects = Subject::pluck('subject_name', 'id');
        return view('scores.edit', compact('score', 'teachers', 'students', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'teacher_id' => 'required',
            'student_id' => 'required',
            'subject_id' => 'required',
            'score' => 'required',
        ]);

        $score = Score::findOrFail($id);
        $score->teacher_id = $request->teacher_id;
        $score->student_id = $request->student_id;
        $score->subject_id = $request->subject_id;
        $score->score = $request->score;
        $score->save();

        return redirect()->route('scores.index')->with('success', 'Score updated successfully.');
    }

    public function destroy($id)
    {
        $score = Score::findOrFail($id);
        $score->delete();

        return redirect()->route('scores.index')->with('success', 'Nilai siswa berhasil dihapus');
    }
}
