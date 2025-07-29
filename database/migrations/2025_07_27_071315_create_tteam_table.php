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
        Schema::create('tteam', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tim');
            $table->integer('total_uang')->default(100000); // Modal awal [cite: 30]
            $table->integer('poin_total')->default(0);
            $table->integer('current_session_int');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tteam');
    }
};
