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
            $table->id();

            // foreign key langsung ke teams
            $table->unsignedBigInteger('team_id');

            $table->integer('city')->default(0);
            $table->integer('folding')->default(0);
            $table->integer('mountain')->default(0);
            $table->integer('unicycle')->default(0);

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->timestamps();
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
