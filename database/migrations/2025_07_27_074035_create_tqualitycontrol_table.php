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
        Schema::create('tqualitycontrol', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idTeam')->constrained('tteam')->onDelete('cascade');
            $table->enum('tipe_mesin', ['1', '2', '3', '4']);
            $table->enum('level_qc', ['1', '2', '3'])->default('1');

            $table->decimal('persentase_defect', 5, 2)->default(0.00);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tqualitycontrol');
    }
};
