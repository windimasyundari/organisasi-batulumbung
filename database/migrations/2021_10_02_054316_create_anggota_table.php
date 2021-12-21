<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('organisasi_id');
            $table->string('nama');
            $table->string('nik', 25);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('email', 50);
            $table->string('password', 10);
            $table->string('no_telp', 15);
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('status');
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
        Schema::dropIfExists('anggota');
    }
}
