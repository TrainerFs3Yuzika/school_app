<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Menampilkan daftar buku.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Menampilkan formulir untuk membuat buku baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create_book');
    }

    /**
     * Menyimpan buku baru ke basis data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'genre' => 'required|string',
            'stok' => 'required|integer|min:0',
        ]);

        // Log data untuk debugging
        \Log::info($request->all());

        // Simpan data buku
        Book::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }


    /**
     * Menampilkan formulir untuk mengedit buku.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit_book', compact('book'));
    }

    /**
     * Menyimpan perubahan pada buku ke basis data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer',
            'genre' => 'required|in:fiksi,non-fiksi,pelajaran',
            'stok' => 'required|integer|min:0',
        ]);

        $book->update($validatedData);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Menghapus buku dari basis data.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
