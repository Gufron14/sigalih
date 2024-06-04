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
            $table->string('desa')->default('Sirnagalih');
            $table->string('kec')->default('Cisurupan');
            $table->string('kab')->default('Garut');
            $table->string('agama');
            $table->string('status');
            $table->string('pekerjaan');
            $table->enum('user_status', ['verified', 'unverified'])->default('unverified');
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
