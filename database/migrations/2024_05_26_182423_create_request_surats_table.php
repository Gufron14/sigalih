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
        Schema::create('request_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users', 'id')
                ->cascadeOnDelete();
            $table->foreignId('jenis_surat_id')
                ->constrained('jenis_surats', 'id')
                ->cascadeOnDelete();
            $table->json('form_data');
            $table->string('nomor_surat')->nullable()->unique();
            $table->date('tanggal_surat')->nullable();
            $table->text('catatan_admin')->nullable();
            $table->string('file_surat')->nullable();
            $table->enum('status', ['tunggu', 'terima', 'tolak'])->default('tunggu');
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_surats');
    }
};
