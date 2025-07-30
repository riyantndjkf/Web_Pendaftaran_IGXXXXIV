<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Create tmachine table
        Schema::create('tmachine', function (Blueprint $table) {
            $table->id();
            $table->enum('name', ['Cutting', 'Welding', 'Painting', 'Assembly']);
            $table->enum('jenis', ['1', '2', '3', '4']);
            $table->integer('harga_dasar');
            $table->integer('kapasitas_dasar')->default(0);
            $table->integer('base_time');
            $table->integer('biaya_jual');
            $table->integer('biaya_maintenance');
            $table->timestamps();
        });

        // Create tsession table
        Schema::create('tsession', function (Blueprint $table) {
            $table->id();
            $table->integer('jenis_sesi')->nullable();
            $table->integer('durasi');
            $table->integer('demand');
            $table->enum('event', ['reward_amount * 1.5', 'maintenance * 1.5'])->nullable();
            $table->timestamps();
        });

        // Create tsoalqr table
        Schema::create('tsoalqr', function (Blueprint $table) {
            $table->id();
            $table->enum('level', ['1', '2', '3']);
            $table->string('pertanyaan', 765);
            $table->integer('reward_amount');
            $table->string('option_1')->nullable();
            $table->string('option_2')->nullable();
            $table->string('option_3')->nullable();
            $table->string('option_4')->nullable();
            $table->string('jawaban_benar');
            $table->string('gambar_soal')->nullable();
            $table->timestamps();
        });

        // Create tfactory table
        Schema::create('tfactory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('isUnlocked')->default(false);
            $table->boolean('isMaintenance')->default(false);
            $table->integer('biaya_unlock')->default(105000);
            $table->dateTime('waktu_unlock')->nullable();
            $table->timestamps();
        });

        // Create tteammachine table
        Schema::create('tteammachine', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('tmachine_id')->constrained('tmachine')->onDelete('restrict')->onUpdate('restrict');
            $table->enum('level', ['1', '2', '3']);
            $table->integer('kapasitas_dasar')->default(0);
            $table->integer('base_time');
            $table->integer('biaya_jual');
            $table->boolean('operator_hired')->default(0);
            $table->timestamps();
        });

        // Create tproduction table
        Schema::create('tproduction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('tsession_id')->constrained('tsession')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('unit_diproduksi');
            $table->integer('unit_defect');
            $table->integer('inventory');
            $table->integer('unit_terjual');
            $table->integer('biaya_invectory');
            $table->integer('maintenance_paid');
            $table->integer('uang_didapatkan');
            $table->integer('poin_didapatkan');
            $table->timestamps();
        });

        // Create tqualitycontrol table
        Schema::create('tqualitycontrol', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('restrict')->onUpdate('restrict');
            $table->enum('tipe_mesin', ['1', '2', '3']);
            $table->enum('level_qc', ['1', '2', '3']);
            $table->integer('persentase_defect');
            $table->timestamps();
        });

        // Create tmysteryenvelope table
        Schema::create('tmysteryenvelope', function (Blueprint $table) {
            $table->id();
            $table->integer('reward_amount');
            $table->string('deskripsi_lokasi');
            $table->foreignId('team_id')->nullable()->constrained('teams')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });

        // Create tteamtask table
        Schema::create('tteamtask', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('tsoalqr_id')->constrained('tsoalqr')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('is_correct');
            $table->boolean('reward_claimed');
            $table->timestamps();
        });

        Schema::create('tconnectmachine', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_team_machine_id');
            $table->unsignedBigInteger('target_team_machine_id');
            $table->timestamps();

            $table->foreign('source_team_machine_id')->references('id')->on('tteammachine')->onDelete('cascade');
            $table->foreign('target_team_machine_id')->references('id')->on('tteammachine')->onDelete('cascade');

            // UNIQUE agar tidak bisa ada duplikat koneksi
            $table->unique(['source_team_machine_id', 'target_team_machine_id'], 'conn_source_target_unique');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('tteamtask');
        Schema::dropIfExists('tmysteryenvelope');
        Schema::dropIfExists('tqualitycontrol');
        Schema::dropIfExists('tproduction');
        Schema::dropIfExists('tteammachine');
        Schema::dropIfExists('tfactory');
        Schema::dropIfExists('tsoalqr');
        Schema::dropIfExists('tsession');
        Schema::dropIfExists('tmachine');
        Schema::dropIfExists('tconnectmachine');

    }
};
