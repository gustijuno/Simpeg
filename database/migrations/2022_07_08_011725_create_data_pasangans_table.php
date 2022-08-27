<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPasangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pasangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_keluarga')->nullable();
            $table->foreign("id_keluarga")->references('id')->on('data_keluarga');
            $table->string('nama_lengkap')->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('jenis_kelamin', 20)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama', 20)->nullable();
            $table->string('pendidikan', 50)->nullable();
            $table->string('jenis_pekerjaan', 50)->nullable();
            $table->string('status_pernikahan', 20)->nullable();
            $table->string('status_hubungan_dalam_keluarga', 20)->nullable();
            $table->string('kewarganegaraan', 20)->nullable();
            $table->string('no_passport', 40)->nullable();
            $table->string('no_kitap', 40)->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
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
        Schema::dropIfExists('data_pasangan');
    }
}
