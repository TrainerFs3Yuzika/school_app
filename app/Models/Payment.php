<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'payment_method',
        'payment_type',
        'payment_instructions',
        'payment_status',
        'proof_of_payment',
    ];

    /**
     * Calculate total income from payment instructions.
     */
    public static function totalPendapatan()
    {
        // Mengambil semua data payment dengan status pembayaran 'Success'
        $payments = self::where('payment_status', 'Success')->get();

        // Inisialisasi variabel total
        $total = 0;

        // Menghitung total dari semua data dalam kolom payment_instructions
        foreach ($payments as $payment) {
            // Membersihkan nilai payment_instructions dari karakter non-angka dan mengonversi ke integer
            $amount = (int) preg_replace('/[^\d]/', '', $payment->payment_instructions); // Mengambil angka dari nilai teks
            $total += $amount;
        }

        // Mengembalikan total pendapatan
        return $total;
    }
}
