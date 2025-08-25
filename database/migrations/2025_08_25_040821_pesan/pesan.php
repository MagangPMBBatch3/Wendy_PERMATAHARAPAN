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
        Schema::create('pesan', function (Blueprint $table) {
            $table->id(); // id INT(11)
            $table->string('pengirim', 100); // pengirim VARCHAR(100)
            $table->string('penerima', 100); // penerima VARCHAR(100)
            $table->text('isi'); // isi TEXT
            $table->id('parent_id')->nullable(); // parent_id INT(11)
            $table->dateTime('tgl_pesan'); // tgl_pesan DATETIME
            $table->foreignId('jenis_id')->constrained('jenis_pesan'); // jenis_id INT(11)
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes(); // deleted_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan');
    }
};
