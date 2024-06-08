<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student; // Import model Student

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Join the payments and students tables
        $payments = Payment::join('students', 'payments.student_id', '=', 'students.id')
            ->select('payments.*', 'students.first_name', 'students.last_name')
            ->get();

        // Get the list of students for the dropdown in the modal
        $students = Student::all();

        return view('payments.index', compact('payments', 'students'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mendapatkan daftar siswa untuk ditampilkan dalam dropdown
        $students = Student::all(); // Mendapatkan semua siswa dari database
        return view('payments.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'payment_method' => 'required',
            'payment_type' => 'required',
            'payment_instructions' => 'required',
            'payment_status' => 'nullable',
            'proof_of_payment' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $data = $request->all();

        if ($request->hasFile('proof_of_payment')) {
            $data['proof_of_payment'] = $request->file('proof_of_payment')->store('proof_of_payments', 'public');
        }

        Payment::create($data);

        return redirect()->route('payments.index')
            ->with('success', 'Payment created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        // Mengambil daftar jenis pembayaran dari enum payment_type
        $payment_types = [
            'Biaya Pendidikan',
            'Seragam Sekolah',
            'Buku dan Materi Pelajaran',
            'Kegiatan Ekstrakurikuler',
            'Makanan dan Kantin',
            'Transportasi',
            'Biaya Acara dan Perjalanan',
            'Biaya Teknologi',
            'Biaya Tambahan',
            'Donasi dan Sumbangan'
        ];

        // Mengambil daftar status pembayaran dari enum payment_status
        $payment_statuses = ['Pending', 'Success', 'Failed'];

        // Mengambil daftar siswa
        $students = Student::all();

        return view('payments.edit', compact('payment', 'payment_types', 'payment_statuses', 'students'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'student_id' => 'required',
            'payment_method' => 'required',
            'payment_type' => 'required',
            'payment_instructions' => 'required',
            'payment_status' => 'nullable',
            'proof_of_payment' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $data = $request->all();

        if ($request->hasFile('proof_of_payment')) {
            // Delete old proof of payment if exists
            if ($payment->proof_of_payment) {
                Storage::disk('public')->delete($payment->proof_of_payment);
            }

            $data['proof_of_payment'] = $request->file('proof_of_payment')->store('proof_of_payments', 'public');
        }

        $payment->update($data);

        return redirect()->route('payments.index')
            ->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        // Delete proof of payment if exists
        if ($payment->proof_of_payment) {
            Storage::disk('public')->delete($payment->proof_of_payment);
        }

        $payment->delete();

        return redirect()->route('payments.index')
            ->with('success', 'Payment deleted successfully.');
    }
}
