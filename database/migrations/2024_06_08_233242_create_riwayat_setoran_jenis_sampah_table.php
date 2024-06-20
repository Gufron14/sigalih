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
        Schema::create('riwayat_setoran_jenis_sampah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_setoran_id')->constrained()->onDelete('cascade');
            $table->foreignId('jenis_sampah_id')->constrained()->onDelete('cascade');
            $table->decimal('berat_sampah', 8, 2);
            $table->decimal('pendapatan', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_setoran_jenis_sampah');
    }
};
