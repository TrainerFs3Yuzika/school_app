<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name === 'Super Admin' || Auth::user()->role_name === 'Student') {
            // Ambil semua data skor dengan informasi guru, siswa, dan mata pelajaran
            $scores = Score::with('teacher', 'student', 'subject')->get();
        } else {
            // Ambil data skor sesuai dengan teacher_id jika pengguna bukan Super Admin
            $teacherId = Auth::id();
            $scores = Score::where('teacher_id', $teacherId)
                ->with('student', 'subject')
                ->get();
        }

        return view('scores.index', compact('scores'));
    }


    public function create()
    {
        $teachers = Auth::user()->id; // Mengambil ID pengguna yang sedang login
        $students = Student::pluck('first_name', 'id');
        $subjects = Subject::pluck('subject_name', 'id');
        return view('scores.create', compact('teachers', 'students', 'subjects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'score' => 'required|numeric|min:0|max:100', // Validasi nilai maksimum
        ]);

        $score = new Score();
        $score->teacher_id = Auth::id(); // Mengatur teacher_id dengan ID pengguna yang sedang login
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
        $students = Student::pluck('first_name', 'id');
        $subjects = Subject::pluck('subject_name', 'id');
        return view('scores.edit', compact('score', 'students', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'score' => 'required|numeric|min:0|max:100', // Validasi nilai maksimum
        ]);

        $score = Score::findOrFail($id);
        $score->teacher_id = Auth::id(); // Mengatur teacher_id dengan ID pengguna yang sedang login
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

    public function exportPdf($id)
    {
        $score = Score::with(['teacher', 'student', 'subject'])->findOrFail($id);
        $pdf = Pdf::loadView('pdf.export-scores', compact('score'));
        return $pdf->download('export-score-' . $score->id . '.pdf');
    }
}
