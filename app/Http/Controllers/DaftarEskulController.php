<?php

namespace App\Http\Controllers;

use App\Models\DaftarEskul;
use App\Models\Eskul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarEskulController extends Controller
{
    public function index()
    {
        $daftarEskuls = DaftarEskul::with('eskul', 'user')->get();
        return view('daftar_eskul.index', compact('daftarEskuls'));
    }

    public function create()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        $eskuls = Eskul::all(); // Ambil semua eskul
        return view('daftar_eskul.create', compact('user', 'eskuls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'eskul_id' => 'required|exists:eskuls,id',
            'user_id' => 'required|exists:users,id',
        ]);

        DaftarEskul::create([
            'eskul_id' => $request->eskul_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('daftar-eskul.index')->with('success', 'Pendaftaran eskul berhasil.');
    }

    public function show($id)
    {
        $daftarEskul = DaftarEskul::with('eskul', 'user')->findOrFail($id);
        return view('daftar_eskul.show', compact('daftarEskul'));
    }

    public function rekap()
    {
        $daftarEskuls = DaftarEskul::with('eskul', 'user')->get();
        return view('daftar_eskul.rekap', compact('daftarEskuls'));
    }
}
