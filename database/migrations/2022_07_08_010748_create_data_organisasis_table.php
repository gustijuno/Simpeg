<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_organisasi', 20)->unique()->nullable();
            $table->string('nama_organisasi')->nullable();
            $table->string('nama_pejabat')->nullable();
            $table->string('status_pejabat', 20)->nullable();
            $table->string('level_organisasi', 20)->nullable();
            $table->string('jobdesk')->nullable();
            $table->string('status', 20)->nullable();
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
        Schema::dropIfExists('data_organisasi');
    }
}
