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
        Schema::create('tmachine', function (Blueprint $table) {
           $table->id();
            $table->enum('name', ['Mesin Pemotong & Bending Pipa', 'Mesin las otomatis', 'Mesin pengecatan & Oven', 'Mesin Perakitan']);
            $table->text('jenis');
            $table->integer('harga_dasar');
            $table->integer('kapasitas_dasar');
            $table->integer('base_time');
            $table->integer('biaya_maintenance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tmachine');
    }
};
