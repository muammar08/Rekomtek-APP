<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratsirtu', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->date('tgl_masehi');
            $table->string('surat_permohonan');
            $table->date('tgl_permohonan');
            $table->string('perihal_permohonan');
            $table->date('tgl_terima');
            $table->string('nama');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('nama_pt');
            $table->string('sumber_sirtu');
            $table->string('wilayah_sungai');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('koordinat');
            $table->string('tujuan');
            $table->string('pengambilan');
            $table->string('pembuangan');
            $table->string('volume_ambil');
            $table->string('jangka_waktu');
            $table->string('nomor_izin_lama')->nullable();
            $table->date('tgl_izin_lama')->nullable();
            $table->date('masa_izin_lama')->nullable();
            $table->string('no_berita_peninjauan');
            $table->date('tgl_berita_peninjauan');
            $table->string('no_berita_acara');
            $table->date('tgl_berita_acara');
            $table->string('type');
            $table->string('word');
            $table->string('pdf');
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
        Schema::dropIfExists('suratsirtu');
    }
};
