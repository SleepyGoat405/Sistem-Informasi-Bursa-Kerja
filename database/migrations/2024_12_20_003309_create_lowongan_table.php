<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowonganTable extends Migration
{
    public function up()
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perusahaan_id');
            $table->string('judul_pekerjaan');
            $table->string('posisi');
            $table->text('deskripsi');
            $table->decimal('gaji', 15, 2);
            $table->timestamps();

            $table->foreign('perusahaan_id')->references('id')->on('perusahaan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lowongan');
    }
}

