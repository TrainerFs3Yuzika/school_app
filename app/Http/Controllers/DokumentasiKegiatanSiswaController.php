<?php

namespace App\Http\Controllers;

use App\Models\DokumentasiKegiatanSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiKegiatanSiswaController extends Controller
{
    /**
     * Menampilkan daftar dokumentasi kegiatan siswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumentasi = DokumentasiKegiatanSiswa::all();
        return view('dokumentasi_kegiatan.index', compact('dokumentasi'));
    }

    /**
     * Menampilkan formulir untuk membuat dokumentasi kegiatan siswa baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokumentasi_kegiatan.create');
    }

    /**
     * Menyimpan dokumentasi kegiatan siswa baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $gambarPath = $request->file('gambar')->store('public/gambar_dokumentasi');

        DokumentasiKegiatanSiswa::create([
            'judul' => $request->input('judul'),
            'gambar' => basename($gambarPath),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('dokumentasi_kegiatan.index')->with('success', 'Dokumentasi kegiatan siswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail dokumentasi kegiatan siswa.
     *
     * @param  \App\Models\DokumentasiKegiatanSiswa  $dokumentasiKegiatanSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(DokumentasiKegiatanSiswa $dokumentasiKegiatanSiswa)
    {
        return view('dokumentasi_kegiatan.show', compact('dokumentasiKegiatanSiswa'));
    }

    /**
     * Menampilkan formulir untuk mengedit dokumentasi kegiatan siswa.
     *
     * @param  \App\Models\DokumentasiKegiatanSiswa  $dokumentasiKegiatanSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(DokumentasiKegiatanSiswa $dokumentasiKegiatanSiswa)
    {
        return view('dokumentasi_kegiatan.edit', compact('dokumentasiKegiatanSiswa'));
    }

    /**
     * Memperbarui dokumentasi kegiatan siswa di dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DokumentasiKegiatanSiswa  $dokumentasiKegiatanSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DokumentasiKegiatanSiswa $dokumentasiKegiatanSiswa)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            Storage::delete('public/gambar_dokumentasi/' . $dokumentasiKegiatanSiswa->gambar);

            $gambarPath = $request->file('gambar')->store('public/gambar_dokumentasi');
            $dokumentasiKegiatanSiswa->gambar = basename($gambarPath);
        }

        $dokumentasiKegiatanSiswa->judul = $request->input('judul');
        $dokumentasiKegiatanSiswa->deskripsi = $request->input('deskripsi');
        $dokumentasiKegiatanSiswa->save();

        return redirect()->route('dokumentasi_kegiatan.index')->with('success', 'Dokumentasi kegiatan siswa berhasil diperbarui.');
    }

    /**
     * Menghapus dokumentasi kegiatan siswa dari database.
     *
     * @param  \App\Models\DokumentasiKegiatanSiswa  $dokumentasiKegiatanSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DokumentasiKegiatanSiswa $dokumentasiKegiatanSiswa)
    {
        // Hapus gambar dari storage
        Storage::delete('public/gambar_dokumentasi/' . $dokumentasiKegiatanSiswa->gambar);

        $dokumentasiKegiatanSiswa->delete();

        return redirect()->route('dokumentasi_kegiatan.index')->with('success', 'Dokumentasi kegiatan siswa berhasil dihapus.');
    }
}
