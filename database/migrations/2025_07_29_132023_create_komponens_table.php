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
        Schema::create('komponen', function (Blueprint $table) {
            $table->string('peserta_namaTim')->unique();
            $table->integer('wheel_26')->default(0);
            $table->integer('wheel_16')->default(0);
            $table->integer('wheel_27')->default(0);
            $table->integer('brake')->default(0);
            $table->integer('pedal')->default(0);
            $table->integer('chain_and_gear')->default(0);
            $table->integer('city_frame')->default(0);
            $table->integer('folding_frame')->default(0);
            $table->integer('mountain_frame')->default(0);
            $table->integer('unicycle_frame')->default(0);
            $table->integer('basket')->default(0);
            $table->integer('hinge')->default(0);
            $table->integer('mountain_suspension')->default(0);
            $table->foreign('peserta_namaTim')->references('namaTim')->on('peserta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponen');
    }
};
