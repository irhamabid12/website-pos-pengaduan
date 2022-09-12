<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// Illuminate\Database\QueryException;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_Pengaduan', function (Blueprint $table) {
            $table->increments('id_Pengaduan');
            $table->string('id_Pelanggan');
            $table->string('nama_Pelanggan');
            $table->string('email_Pelanggan');
            $table->string('nomor_HP_Pelanggan');
            $table->string('jenis_Pengaduan');
            $table->string('jenis_Kiriman');
            $table->string('nomor_Resi');
            $table->string('sumber_Pengaduan');
            $table->string('Kantor_Asal_Kiriman');
            $table->string('Kantor_Tujuan_Kiriman');
            $table->string('isi_Pengaduan');
            $table->string('respon_admin');            
            $table->string('status');
            $table->string('ditambah_Oleh');
            $table->string('diubah_Oleh');
            $table->timestamps();
            

        });

        // Schema::table('data_pengaduan', function (Blueprint $table) {
        //     // $table->unsignedBigInteger('jpengaduan_id');
         
        //     $table->foreign('jpengaduan_id')->references('id_jpengaduan')->on('jenis_pengaduan');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pengaduan');
    }
};
