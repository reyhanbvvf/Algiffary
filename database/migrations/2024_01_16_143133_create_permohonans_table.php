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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('restrict');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('no_surat');
            $table->string('nama_pjb');
            $table->date('tgl_awal')->nullable();
            $table->date('tgl_berakhir')->nullable();
            $table->enum('status', ['pending', 'verifikasi', 'proses', 'selesai'])->default('pending');
            $table->enum('tipe_permohonan', ['baru', 'perpanjangan']);
            $table->string('ktp');
            $table->string('dokumen');
            $table->tinyInteger('isActive')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
