<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('layanans', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('nik')->unique()->constrained('wargas', 'nik');
            $table->foreignId('id_jenisSurat')
                ->constrained('jenis_surats', 'id_jenisSurat')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->enum('status', ['tunggu', 'tinjau', 'proses', 'selesai', 'tolak'])->default('tunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
};
