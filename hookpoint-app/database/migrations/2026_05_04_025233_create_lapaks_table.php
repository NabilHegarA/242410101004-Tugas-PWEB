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
        Schema::create('lapaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lapak');
            $table->string('jenis');
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi');
            $table->enum('status', ['available', 'unavailable']);
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapaks');
    }
};
