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
        Schema::create('isi_kiriman', function (Blueprint $table) {
            $table->id('id_isi_kiriman');
            $table->integer('id_surat_pengajuan')->unique()->nullable($value = true);;
            $table->string('jumlah')->nullable($value = true);;
            $table->string('isi_kiriman')->nullable($value = true);;
            $table->string('berat')->nullable($value = true);;
            $table->string('bahan')->nullable($value = true);;
            $table->string('negara_pembuat')->nullable($value = true);;
            $table->string('nilai_isi_kiriman')->nullable($value = true);;
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
        Schema::dropIfExists('isi_kiriman');
    }
};
