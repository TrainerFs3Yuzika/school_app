<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eskul;
use App\Models\Student;
use Toastr;

class EskulController extends Controller
{
    // Menampilkan semua eskul
    public function index(Request $request)
    {
        $query = $request->input('search');
        $eskuls = Eskul::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('nama_eskul', 'like', '%' . $query . '%')
                ->orWhere('pembina', 'like', '%' . $query . '%')
                ->orWhere('waktu_eskul', 'like', '%' . $query . '%');
        })->get(); // Gunakan get() jika tidak ingin menggunakan pagination, jika ingin menggunakan pagination, gunakan paginate()

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
            'nama_eskul' => 'required',
            'pembina' => 'required',
            'waktu_eskul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengunggah gambar
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName);

        Eskul::create([
            'nama_eskul' => $request->nama_eskul,
            'pembina' => $request->pembina,
            'waktu_eskul' => $request->waktu_eskul,
            'gambar' => $imageName,
        ]);

        Toastr::success('Ekstrakurikuler berhasil ditambahkan.', 'Sukses');

        return redirect()->route('eskuls.index');
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
            'nama_eskul' => 'required',
            'pembina' => 'required',
            'waktu_eskul' => 'required',
        ]);

        $eskul->update($request->all());

        Toastr::success('Ekstrakurikuler berhasil diperbarui.', 'Sukses');

        return redirect()->route('eskuls.index');
    }

    // Menghapus eskul
    public function destroy(Eskul $eskul)
    {
        $eskul->delete();

        Toastr::success('Ekstrakurikuler berhasil dihapus.', 'Sukses');

        return redirect()->route('eskuls.index');
    }
}
