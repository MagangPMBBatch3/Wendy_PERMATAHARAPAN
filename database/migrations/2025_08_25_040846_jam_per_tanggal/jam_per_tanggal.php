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
        Schema::create('jam_per_tanggal', function (Blueprint $table) {
    $table->id();
    $table->foreignId('bagian_id')->constrained('bagian')->onUpdate('cascade')->onDelete('cascade');
    $table->string('no_wbs', 50);
    $table->foreignId('proyek_id')->constrained('proyek');
    $table->date('tanggal');
    $table->decimal('jam', 5, 2);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jam_per_tanggal');
    }
};
