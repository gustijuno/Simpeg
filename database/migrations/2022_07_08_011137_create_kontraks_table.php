<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontraksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrak', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign('id_pegawai')->references('id')->on('pegawai');
            $table->date('kontrak_1')->nullable();
            $table->date('selesai_kontrak_1')->nullable();
            $table->date('kontrak_2')->nullable();
            $table->date('selesai_kontrak_2')->nullable();
            $table->date('kontrak_3')->nullable();
            $table->date('selesai_kontrak_3')->nullable();
            $table->date('kontrak_4')->nullable();
            $table->date('selesai_kontrak_4')->nullable();
            $table->date('kontrak_5')->nullable();
            $table->date('selesai_kontrak_5')->nullable();
            $table->date('kontrak_6')->nullable();
            $table->date('selesai_kontrak_6')->nullable();
            $table->date('kontrak_7')->nullable();
            $table->date('selesai_kontrak_7')->nullable();
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
        Schema::dropIfExists('kontrak');
    }
}
