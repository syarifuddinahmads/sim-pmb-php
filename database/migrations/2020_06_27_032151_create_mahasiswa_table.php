<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('nama_mahasiswa');
            $table->string('email')->unique();
            $table->integer('jurusan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('skl')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('kk')->nullable();
            $table->integer('status')->default('0');
            $table->timestamp('registered_at');
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
        Schema::dropIfExists('mahasiswa');
    }
}
