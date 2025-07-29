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
        Schema::create('tfactory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idTeam')->constrained('tteam')->onDelete('cascade');
            $table->boolean('is_unlocked')->default(false);
            $table->boolean('idMaintenance')->default(false);
            $table->integer('biaya_unlock')->default(105000); // [cite: 73]
            $table->dateTime('waktu_unlock')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tfactory');
    }
};
