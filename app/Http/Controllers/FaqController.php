<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data FAQ ke database
        Faq::create($request->all());

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'FAQ added successfully.');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Temukan FAQ dan update datanya
        $faq = Faq::findOrFail($id);
        $faq->update($request->all());

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan FAQ dan hapus
        $faq = Faq::findOrFail($id);
        $faq->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'FAQ deleted successfully.');
    }
}
