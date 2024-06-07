<?php
// app/Http/Controllers/EskulController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eskul;
use App\Models\Student;

class EskulController extends Controller
{
    // Menampilkan semua eskul
    public function index()
    {
        $eskuls = Eskul::all();
        return view('eskuls.index', compact('eskuls'));
    }

    // Menampilkan form untuk membuat eskul baru
    public function create()
    {
        $students = Student::all();
        return view('eskuls.create', compact('students'));
    }

    // Menyimpan eskul baru yang dibuat
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'nama_eskul' => 'required',
            'pembina' => 'required',
            'waktu_eskul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengunggah gambar
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName);

        Eskul::create([
            'student_id' => $request->student_id,
            'nama_eskul' => $request->nama_eskul,
            'pembina' => $request->pembina,
            'waktu_eskul' => $request->waktu_eskul,
            'gambar' => $imageName,
        ]);

        return redirect()->route('eskuls.index')->with('success', 'Eskul berhasil ditambahkan.');
    }

    // Menampilkan detail eskul
    public function show(Eskul $eskul)
    {
        return view('eskuls.show', compact('eskul'));
    }

    // Menampilkan form untuk mengedit eskul
    public function edit(Eskul $eskul)
    {
        $students = Student::all();
        return view('eskuls.edit', compact('eskul', 'students'));
    }

    // Menyimpan perubahan pada eskul yang diedit
    public function update(Request $request, Eskul $eskul)
    {
        $request->validate([
            'student_id' => 'required',
            'nama_eskul' => 'required',
            'pembina' => 'required',
            'waktu_eskul' => 'required',
        ]);

        $eskul->update($request->all());

        return redirect()->route('eskuls.index')->with('success', 'Eskul berhasil diperbarui.');
    }

    // Menghapus eskul
    public function destroy(Eskul $eskul)
    {
        $eskul->delete();

        return redirect()->route('eskuls.index')->with('success', 'Eskul berhasil dihapus.');
    }
}
