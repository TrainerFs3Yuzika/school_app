<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TagihanSiswa;
use App\Models\User;

class TagihanSiswaController extends Controller
{
    public function index()
    {
        // Memeriksa peran pengguna
        if (Auth::user()->role_name === 'Admin') {
            $tagihans = TagihanSiswa::all(); // Admin dapat melihat semua tagihan
        } else {
            $userId = Auth::id();
            $tagihans = TagihanSiswa::where('user_id', $userId)->get(); // Pengguna biasa hanya melihat tagihan mereka sendiri
        }

        return view('tagihan_siswa.index', compact('tagihans'));
    }

    public function create()
    {
        // Ambil semua pengguna untuk ditampilkan dalam dropdown
        $users = User::all();

        return view('tagihan_siswa.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'payment_type' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        TagihanSiswa::create([
            'user_id' => $request->user_id,
            'payment_type' => $request->payment_type,
            'amount' => $request->amount,
        ]);

        return redirect()->route('tagihan_siswa.index')->with('success', 'Tagihan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $tagihan = TagihanSiswa::findOrFail($id);

        // Memeriksa peran pengguna
        if (Auth::user()->role_name !== 'Admin' && $tagihan->user_id !== Auth::id()) {
            abort(403); // Menolak akses jika bukan admin dan tidak memiliki tagihan
        }

        return view('tagihan_siswa.show', compact('tagihan'));
    }

    public function edit($id)
    {
        $tagihan = TagihanSiswa::findOrFail($id);
        $users = User::all();

        // Memeriksa peran pengguna
        if (Auth::user()->role_name !== 'Admin' && $tagihan->user_id !== Auth::id()) {
            abort(403); // Menolak akses jika bukan admin dan tidak memiliki tagihan
        }

        return view('tagihan_siswa.edit', compact('tagihan', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari formulir
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'payment_type' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Temukan tagihan berdasarkan ID
        $tagihan = TagihanSiswa::findOrFail($id);

        // Memeriksa peran pengguna
        if (Auth::user()->role_name !== 'Admin' && $tagihan->user_id !== Auth::id()) {
            abort(403); // Menolak akses jika bukan admin dan tidak memiliki tagihan
        }

        // Perbarui tagihan
        $tagihan->update([
            'user_id' => $request->user_id,
            'payment_type' => $request->payment_type,
            'amount' => $request->amount,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tagihan_siswa.index')->with('success', 'Tagihan berhasil diperbarui.');
    }




    public function destroy($id)
    {
        $tagihan = TagihanSiswa::findOrFail($id);

        // Memeriksa peran pengguna
        if (Auth::user()->role_name !== 'Admin' && $tagihan->user_id !== Auth::id()) {
            abort(403); // Menolak akses jika bukan admin dan tidak memiliki tagihan
        }

        $tagihan->delete();

        return redirect()->route('tagihan_siswa.index')->with('success', 'Tagihan berhasil dihapus.');
    }
}
