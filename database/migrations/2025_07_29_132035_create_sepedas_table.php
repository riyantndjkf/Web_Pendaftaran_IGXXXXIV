<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sepeda', function (Blueprint $table) {
            $table->string('komponen_peserta_namaTim');
            $table->integer('city')->default(0);
            $table->integer('folding')->default(0);
            $table->integer('mountain')->default(0);
            $table->integer('unicycle')->default(0);
            $table->foreign('komponen_peserta_namaTim')->references('peserta_namaTim')->on('komponen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sepeda');
    }
};
