<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Score;
use App\Models\Student;
use App\Models\Teacher;

class landing_pageConntroller extends Controller
{
    public function index()
    {
        // Ambil semua data buku
        $books = Book::all();

        // Ambil tiga siswa dengan nilai tertinggi
        $topStudents = Score::with(['student', 'subject', 'teacher'])
            ->orderBy('score', 'desc')
            ->take(3)
            ->get();

        // Debugging: Pastikan data topStudents ada
        // dd($topStudents);

        // Kirim data buku dan top students ke view
        return view('landing_page.index', compact('books', 'topStudents'));
    }
}
