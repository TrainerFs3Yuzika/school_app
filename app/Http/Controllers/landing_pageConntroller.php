<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ContactInformation;
use App\Models\Score;

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

        $contacts = ContactInformation::all();

        // Debugging: Pastikan data topStudents ada
        // dd($topStudents);

        // Kirim data buku dan top students ke view

        return view('landing_page.index', compact('books', 'topStudents'));

        return view('landing_page.index', compact('books', 'topStudents', 'contacts'));

    }
}
