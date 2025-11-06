<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('satker', function (Blueprint $table) {
            $table->bigIncrements('kode_satker'); // atau integer() + primary() jika mau int biasa

            // PAKAI bigInteger() + unsigned() biar sama dengan $table->id()
            $table->unsignedBigInteger('kode_renmin');
            $table->unsignedBigInteger('kode_pimpinan');

            $table->string('name');
            $table->text('deskripsi')->nullable();

            $table->timestamps();

            // Foreign key dengan tipe data yang BENAR
            $table->foreign('kode_renmin')
                  ->references('kode_renmin')
                  ->on('renmin')
                  ->onDelete('cascade');

            $table->foreign('kode_pimpinan')
                  ->references('kode_pimpinan')
                  ->on('pimpinan')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('satker');
    }
};