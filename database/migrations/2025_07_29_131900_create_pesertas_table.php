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
        Schema::create('peserta', function (Blueprint $table) {
        $table->string('namaTim')->primary();
        $table->string('password', 8)->nullable();
        $table->string('peserta1', 45)->nullable();
        $table->string('peserta2', 45)->nullable();
        $table->string('peserta3', 45)->nullable();
        $table->string('alamat', 45)->nullable();
        $table->integer('nomorTelephone')->nullable();
        $table->string('email', 45)->nullable();
        $table->string('riwayat_penyakit', 45)->nullable();
        $table->string('alergi', 45)->nullable();
        $table->binary('idCard')->nullable();
        $table->string('sekolah', 35)->nullable();
        $table->binary('pembayaran')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
