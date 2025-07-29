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
        Schema::create('tproduction', function (Blueprint $table) {
           $table->id();
            $table->foreignId('idTeam')->constrained('tTeam')->onDelete('cascade');
            $table->foreignId('idSession')->constrained('tSession')->onDelete('cascade');

            $table->integer('unit_diproduksi')->default(0);
            $table->integer('unit_defect')->default(0);
            $table->integer('inventory')->default(0); 
            $table->integer('unit_terjual')->default(0);
            
            $table->integer('biaya_inventory')->default(0);
            $table->boolean('maintenance_paid')->default(false);
            $table->integer('uang_didapatkan')->default(0);
            $table->integer('poin_didapatkan')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tproduction');
    }
};
