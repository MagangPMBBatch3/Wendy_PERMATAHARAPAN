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
        Schema::table('mode_jam_kerja', function (Blueprint $table) {
            $table->string('jam_masuk')->after('nama');
            $table->string('jam_keluar')->after('jam_masuk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mode_jam_kerja', function (Blueprint $table) {
            $table->dropColumn('jam_masuk');
            $table->dropColumn('jam_keluar');
        });
    }
};
