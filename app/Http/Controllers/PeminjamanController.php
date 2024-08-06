<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PeminjamanController extends Controller
{
    /**
     * Menampilkan daftar peminjaman.
     *
     * @return \Illuminate\Http\Response
     */
    // In PeminjamanController.php
    // In PeminjamanController@index method
    // app/Http/Controllers/PeminjamanController.php
    public function index()
    {
        $peminjamans = Peminjaman::with('book', 'user')->get(); // Memuat relasi book dan user
        return view('peminjaman.index', compact('peminjamans'));
    }




    /**
     * Menampilkan form untuk membuat peminjaman baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Ambil book_id dari request jika tersedia
        $book_id = $request->input('book_id');

        // Ambil semua buku dan pengguna
        $books = Book::all();
        $users = User::all();

        return view('peminjaman.create', compact('books', 'users', 'book_id'));
    }

    /**
     * Menyimpan peminjaman baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // In PeminjamanController@store
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'jumlah_buku' => 'required|integer|min:1',
            'status' => ['nullable', Rule::in(['belum_dikembalikan', 'sudah_dikembalikan', 'diterima', 'ditolak'])],
        ], [
            'tanggal_kembali.after' => 'Tanggal kembali harus setelah tanggal pinjam.',
        ]);

        // Ambil buku yang dipilih
        $book = Book::findOrFail($request->book_id);

        // Cek apakah jumlah buku yang dipinjam melebihi stok
        if ($request->jumlah_buku > $book->stok) {
            return redirect()->back()->with('error', 'Jumlah buku yang dipinjam melebihi stok yang tersedia.');
        }

        // Kurangi stok buku
        $book->stok -= $request->jumlah_buku;
        $book->save();

        // Buat peminjaman baru
        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan!');
    }




    /**
     * Menampilkan form untuk mengedit peminjaman.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $books = Book::all();
        $users = User::all();

        return view('peminjaman.edit', compact('peminjaman', 'books', 'users'));
    }

    /**
     * Memperbarui peminjaman yang ada dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'nama_peminjam' => 'required|string',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'jumlah_buku' => 'required|integer|min:1',
            'status' => ['nullable', Rule::in(['belum_dikembalikan', 'sudah_dikembalikan', 'diterima', 'ditolak'])],
        ], [
            'tanggal_kembali.after' => 'Tanggal kembali harus setelah tanggal pinjam.',
        ]);

        // Temukan dan perbarui peminjaman yang ada
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui!');
    }

    /**
     * Menghapus peminjaman dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan dan hapus peminjaman
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus!');
    }
}
