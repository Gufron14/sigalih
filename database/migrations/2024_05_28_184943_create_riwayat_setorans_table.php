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
        Schema::create('riwayat_setorans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nasabah_id')->constrained('users', 'id')->onDelete('cascade');
            $table->decimal('total_berat_sampah', 8, 2);
            $table->decimal('total_pendapatan', 10, 2);
            $table->enum('jenis_transaksi', ['tunai', 'tabung']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_setorans');
    }
};
