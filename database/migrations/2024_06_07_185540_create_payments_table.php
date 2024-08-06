<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->enum('payment_method', ['Transfer Bank', 'Pembayaran Tunai', 'Pembayaran Online', 'Cek atau Giro', 'Pembayaran Daring melalui Bank', 'Pembayaran dengan Kartu Prabayar']);
            $table->enum('payment_type', ['Biaya Pendidikan', 'Seragam Sekolah', 'Buku dan Materi Pelajaran', 'Kegiatan Ekstrakurikuler', 'Makanan dan Kantin', 'Transportasi', 'Biaya Acara dan Perjalanan', 'Biaya Teknologi', 'Biaya Tambahan', 'denda buku', 'Donasi dan Sumbangan',]);
            $table->text('payment_instructions');
            $table->enum('payment_status', ['Pending', 'Success', 'Failed']);
            $table->string('proof_of_payment')->nullable(); // Kolom untuk upload bukti transfer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
