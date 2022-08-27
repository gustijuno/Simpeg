<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignkeyOnPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->foreign("kode_jabatan")->references('id')->on('jabatan');
            $table->foreign("kode_tipe_pegawai")->references('id')->on('tipe_pegawai');
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
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropForeign(['kode_jabatan']);
            $table->dropForeign(['kode_tipe_pegawai']);
            $table->dropForeign(['kode_organisasi']);
            $table->dropForeign(['id_training']);
            $table->dropForeign(['id_kontrak']);
            $table->dropForeign(['id_keluarga']);
        });
    }
}
