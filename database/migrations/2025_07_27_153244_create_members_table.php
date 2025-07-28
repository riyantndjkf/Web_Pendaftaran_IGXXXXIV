<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->onDelete('cascade'); // Terhubung ke tabel teams
            $table->string('status'); // 'ketua' atau 'anggota'
            $table->string('nama_lengkap');
            $table->text('alamat');
            $table->string('nomor_telepon');
            $table->string('email')->unique();
            $table->string('riwayat_penyakit')->default('-');
            $table->string('alergi')->default('-');
            $table->string('path_kartu_pelajar'); // Menyimpan path file di storage
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};