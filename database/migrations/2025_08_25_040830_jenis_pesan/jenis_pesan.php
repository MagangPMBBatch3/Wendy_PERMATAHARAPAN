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
        Schema::create('jenis_pesan', function (Blueprint $table) {
            $table->id(); // id INT(11)
            $table->string('nama', 50); // nama VARCHAR(50)
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes(); // deleted_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pesan');
    }
};
