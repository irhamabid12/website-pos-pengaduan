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
        Schema::create('message_complaint', function (Blueprint $table) {
            $table->increments('id_message');
            $table->integer('id_user');
            $table->integer('jenis_pengaduan');
            $table->integer('jenis_produk');
            $table->string('data_pengaduan');
            $table->string('isi_pengaduan');
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
        Schema::dropIfExists('message_complaint');
    }
};
