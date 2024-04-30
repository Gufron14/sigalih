<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->unique();
            $table->string('nama');
            $table->string('ttl');
            $table->string('jk');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('desa');
            $table->string('agama');
            $table->string('stts_perkawinan');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan')->default('Indonesia');
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
        Schema::dropIfExists('wargas');
    }
};
