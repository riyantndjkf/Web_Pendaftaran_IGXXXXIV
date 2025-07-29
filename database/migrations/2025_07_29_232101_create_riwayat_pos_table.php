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
        Schema::create('riwayat_pos', function (Blueprint $table) {
            $table->id();
            $table->string('peserta_namaTim');
            $table->foreign('peserta_namaTim')->references('namaTim')->on('peserta')->onDelete('cascade');
            $table->unsignedBigInteger('pos_id');
            $table->foreign('pos_id')->references('id')->on('pos')->onDelete('cascade');
            $table->timestamp('waktu')->useCurrent();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pos');
    }
};
