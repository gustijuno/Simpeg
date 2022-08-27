<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string("nip", 25)->unique()->nullable();
            $table->string("nama", 100)->nullable();
            $table->string('status_karyawan', 10)->nullable();
            $table->string('masa_kerja', 20)->nullable();
            $table->string("asal_kepegawaian", 10)->nullable();
            $table->string("jenis_kelamin", 15)->nullable();
            $table->string("pendidikan_terakhir", 10)->nullable();
            $table->string("pendidikan_tnt", 15)->nullable();
            $table->string('jurusan_pendidikan', 50)->nullable();
            $table->string('sekolah_universitas', 50)->nullable();
            $table->string('pendidikan_diakui', 50)->nullable();
            $table->string("tempat_lahir", 255)->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->string('umur', 10)->nullable();
            $table->string("agama", 15)->nullable();
            $table->string("status_hubungan_dalam_keluarga", 10)->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->string("nama_ibu", 100)->nullable();
            $table->string('alamat_ktp', 255)->nullable();
            $table->string("alamat_domisili", 255)->nullable();
            $table->string('kota_asal', 50)->nullable();
            $table->string("no_ktp", 50)->nullable();
            $table->string('kewarganegaraan', 25)->nullable();
            $table->string("no_kitap", 50)->nullable();
            $table->string("no_bpjs_kesehatan", 50)->nullable();
            $table->string('no_passport', 50)->nullable();
            $table->string("no_bpjs_ketenagakerjaan", 50)->nullable();
            $table->string('nama_bank', 100)->nullable();
            $table->string("no_rekening_gaji", 50)->nullable();
            $table->string('no_rekening_ppip', 50)->nullable();
            $table->string("npwp", 50)->nullable();
            $table->string('no_handphone', 20)->nullable();
            $table->string("email", 75)->nullable();
            $table->string('unit_kerja', 255)->nullable();
            $table->string("departemen", 255)->nullable();
            $table->string('division', 255)->nullable();
            $table->string("foto_pegawai", 255)->nullable();
            $table->unsignedBigInteger("kode_jabatan")->nullable();
            $table->unsignedBigInteger("kode_tipe_pegawai")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
