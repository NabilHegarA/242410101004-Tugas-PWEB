<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // RELASI
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('lapak_id')->constrained()->onDelete('cascade');

            // DATA BOOKING
            $table->date('tanggal_booking');

            // SNAPSHOT HARGA (biar tidak berubah)
            $table->integer('harga_snapshot');

            // BUKTI TRANSFER (WAJIB karena langsung upload)
            $table->string('bukti_tf');

            // STATUS
            $table->enum('status', [
                'pending',
                'confirmed',
                'completed',
                'canceled',
                'rejected'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
