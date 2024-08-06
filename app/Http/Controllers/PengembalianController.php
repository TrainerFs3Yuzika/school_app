<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function create(Request $request)
    {
        $peminjaman_id = $request->query('peminjaman_id');

        if (!$peminjaman_id) {
            return redirect()->route('pengembalian.index')->with('error', 'ID Peminjaman tidak ditemukan.');
        }

        $peminjaman = Peminjaman::find($peminjaman_id);

        if (!$peminjaman) {
            return redirect()->route('pengembalian.index')->with('error', 'Peminjaman tidak ditemukan.');
        }

        return view('pengembalian.create', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman,id',
            'tanggal_pengembalian' => 'required|date',
            'denda' => 'nullable|numeric',
        ]);

        $pengembalian = new Pengembalian();
        $pengembalian->peminjaman_id = $request->peminjaman_id;
        $pengembalian->tanggal_pengembalian = $request->tanggal_pengembalian;
        $pengembalian->denda = $request->denda;
        $pengembalian->save();

        // Update status peminjaman
        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);
        $peminjaman->status = 'sudah_dikembalikan';
        $peminjaman->save();

        // Update stok buku
        $book = Book::findOrFail($peminjaman->book_id);
        $book->stok += $peminjaman->jumlah_buku;
        $book->save();

        return redirect()->route('pengembalian.index')->with('success', 'Buku berhasil dikembalikan.');
    }


    public function index()
    {
        $pengembalians = Pengembalian::with('peminjaman')->get();
        $peminjamans = Peminjaman::all(); // Ambil semua data peminjaman

        return view('pengembalian.index', compact('pengembalians', 'peminjamans'));
    }
}
