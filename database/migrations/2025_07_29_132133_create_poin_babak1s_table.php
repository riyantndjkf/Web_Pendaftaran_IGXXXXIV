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
        Schema::create('poin_babak1', function (Blueprint $table) {
            $table->string('sepeda_komponen_peserta_namaTim1')->primary();
            $table->integer('poin')->default(0);
            $table->integer('sesi')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin_babak1');
    }
};
