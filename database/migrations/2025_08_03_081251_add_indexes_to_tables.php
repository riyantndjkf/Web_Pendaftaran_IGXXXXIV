<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // tconnectmachine
        Schema::table('tconnectmachine', function (Blueprint $table) {
            $table->index('team_id');
            $table->index('source_team_machine_id');
            $table->index('target_team_machine_id');
        });

        // tteammachine
        Schema::table('tteammachine', function (Blueprint $table) {
            $table->index('tmachine_id');
        });

        // tmachine
        Schema::table('tmachine', function (Blueprint $table) {
            $table->index('jenis');
        });
    }

    public function down(): void
    {
        Schema::table('tconnectmachine', function (Blueprint $table) {
            $table->dropIndex(['team_id']);
            $table->dropIndex(['source_team_machine_id']);
            $table->dropIndex(['target_team_machine_id']);
        });

        Schema::table('tteammachine', function (Blueprint $table) {
            $table->dropIndex(['tmachine_id']);
        });

        Schema::table('tmachine', function (Blueprint $table) {
            $table->dropIndex(['jenis']);
        });
    }
};
