<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEskulUserTable extends Migration
{
    public function up()
    {
        Schema::create('eskul_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eskul_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('eskul_id')->references('id')->on('eskuls')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['eskul_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('eskul_user');
    }
}
