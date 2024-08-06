<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Eskul;
use App\Models\Score;
use App\Models\Lessons;
use App\Models\ContactInformation;
use App\Models\Faq; // Impor model FAQ
use App\Models\DokumentasiKegiatanSiswa; // Impor model DokumentasiKegiatanSiswa

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

        // Ambil informasi kontak
        $contacts = ContactInformation::all();

        // Ambil jadwal guru
        $jadwalGuru = Lessons::all();

        // Ambil tiga data eskul dengan ID tertinggi
        $eskuls = Eskul::orderBy('id', 'desc')->take(3)->get();

        // Ambil semua FAQ untuk ditampilkan
        $faqs = Faq::all();
        // Ambil semua dokumentasi kegiatan siswa
        $dokumentasi = DokumentasiKegiatanSiswa::all();

        // Kirim data ke view
        return view('landing_page.index', compact('books', 'topStudents', 'contacts', 'jadwalGuru', 'eskuls', 'faqs', 'dokumentasi'));
    }

    public function blogDetails()
    {
        return view('landing_page.blog-details');
    }

    public function blog()
    {
        return view('landing_page.blog');
    }

    public function portfolioDetails()
    {
        return view('landing_page.portfolio-details');
    }

    public function servicesDetails()
    {
        return view('landing_page.services-details');
    }
}
