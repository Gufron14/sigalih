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
        Schema::create('detail_riwayat_setorans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_setoran_id')->constrained('riwayat_setorans', 'id')->cascadeOnDelete();
            $table->foreignId('jenis_sampah_id')->constrained('jenis_sampahs', 'id')->cascadeOnDelete();
            $table->decimal('berat_sampah', 8, 2);
            $table->decimal('pendapatan', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_riwayat_setorans');
    }
};
