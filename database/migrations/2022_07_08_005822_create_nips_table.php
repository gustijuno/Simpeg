<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNIPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nip', function (Blueprint $table) {
            $table->id();
            $table->string('id_kepegawaian', 10);
            $table->string('tahun_sk', 50);
            $table->string('no_urut_pegawai', 50);
            $table->string('nama_lengkap');
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
        Schema::dropIfExists('nip');
    }
}
