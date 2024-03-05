<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permohonan_id');
            $table->foreign('permohonan_id')->references('id')->on('permohonans')->onDelete('restrict');
            $table->enum('status_pembayaran', ['tepat waktu', 'terlambat'])->nullable();
            $table->enum('verifikasi', ['diterima', 'bukti tidak valid'])->nullable();
            $table->tinyInteger('denda')->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->string('jumlah')->nullable();
            $table->string('bukti')->nullable();
            $table->date('bayar_awal');
            $table->date('bayar_berakhir');
            $table->date('tanggal_upload')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
