<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            // Kolom ini bisa null karena hanya tim pertama dari bundle yang akan mengisinya
            $table->string('foto_bukti_pembayaran')->nullable()->after('asal_sekolah');
            $table->boolean('ver_bukti_bayar')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('foto_bukti_pembayaran');
            $table->boolean('ver_bukti_bayar')->default(false);
        });
    }
};
