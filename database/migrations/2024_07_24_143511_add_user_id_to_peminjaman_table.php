<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPeminjamanTable extends Migration
{
    /**
     * Tambahkan kolom user_id ke tabel peminjaman.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('jumlah_buku'); // Menambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users'); // Menambahkan foreign key constraint
        });
    }

    /**
     * Hapus kolom user_id dari tabel peminjaman.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Menghapus foreign key constraint
            $table->dropColumn('user_id'); // Menghapus kolom user_id
        });
    }
}
