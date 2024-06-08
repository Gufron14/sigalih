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
        Schema::create('file_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_surat_id')
                ->constrained('jenis_surats', 'id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();  
            $table->string('file_path');
            // $table->enum('status', ['Dikirim','Diunduh']);
            // $table->date('tgl_persetujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_surats');
    }
};
