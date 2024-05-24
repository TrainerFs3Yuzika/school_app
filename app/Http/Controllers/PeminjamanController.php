<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Book;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('book')->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $books = Book::all();
        return view('peminjaman.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'nama_peminjam' => 'required|string',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'jumlah_buku' => 'required|integer|min:1',
            'status' => 'nullable|in:belum_dikembalikan,sudah_dikembalikan,diterima,ditolak',
        ]);

        if ($request->tanggal_pinjam == $request->tanggal_kembali) {
            return redirect()->back()->with('error', 'Maaf, waktu peminjaman dan pengembalian tidak boleh sama.');
        }

        $peminjaman = Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $books = Book::all();
        return view('peminjaman.edit', compact('peminjaman', 'books'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'nama_peminjam' => 'required|string',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'jumlah_buku' => 'required|integer|min:1',
            'status' => 'nullable|in:belum_dikembalikan,sudah_dikembalikan,diterima,ditolak',
        ]);

        if ($request->tanggal_pinjam == $request->tanggal_kembali) {
            return redirect()->back()->with('error', 'Maaf, waktu peminjaman dan pengembalian tidak boleh sama.');
        }

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus!');
    }
}
