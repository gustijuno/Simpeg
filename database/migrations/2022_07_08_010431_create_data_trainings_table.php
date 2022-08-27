<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_training', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign("id_pegawai")->references('id')->on('pegawai');
            $table->string('jenis_training', 50)->nullable();
            $table->string('penyelenggara', 50)->nullable();
            $table->string('lokasi_training', 80)->nullable();
            $table->date('waktu_mulai_pelaksanaan')->nullable();
            $table->date('waktu_selesai_pelaksanaan')->nullable();
            $table->string('dokumen_data_training')->nullable();
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
        Schema::dropIfExists('data_training');
    }
}
