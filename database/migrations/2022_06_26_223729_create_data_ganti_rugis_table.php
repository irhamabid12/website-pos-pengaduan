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
        Schema::create('data_ganti_rugi', function (Blueprint $table) {
            $table->id();
            $table->string('id_Pengaduan')->nullable($value = true);
            $table->string('kantor_pos')->nullable($value = true);
            $table->string('tanggal_surat')->nullable($value = true);
            $table->string('nomor_surat')->nullable($value = true);
            $table->string('nama_pelanggan')->nullable($value = true);
            $table->string('nomor_hp_pelanggan')->nullable($value = true);
            $table->string('alamat_pelanggan')->nullable($value = true);
            $table->string('nomor_resi')->nullable($value = true);           
            $table->string('kantor_asal_kiriman')->nullable($value = true);
            $table->string('biaya_kirim')->nullable($value = true);
            $table->string('nilai_ganti_rugi')->nullable($value = true);           
            $table->string('tanggal_kirim')->nullable($value = true);
            $table->string('berat_barang')->nullable($value = true);
            $table->string('nilai_barang')->nullable($value = true);
            $table->string('jenis_pengaduan')->nullable($value = true);
            $table->string('jenis_kiriman')->nullable($value = true);
            $table->string('nama_pengirim')->nullable($value = true);
            $table->string('email_pengirim')->nullable($value = true);
            $table->string('nomor_hp_pengirim')->nullable($value = true);
            $table->string('kode_pos_pengirim')->nullable($value = true);
            $table->string('alamat_pengirim')->nullable($value = true);
            $table->string('nama_penerima')->nullable($value = true);
            $table->string('email_penerima')->nullable($value = true);
            $table->string('nomor_hp_penerima')->nullable($value = true);
            $table->string('kode_pos_penerima')->nullable($value = true);
            $table->string('alamat_penerima')->nullable($value = true);
            $table->string('keterangan_isi_kiriman')->nullable($value = true);
            $table->string('jenis_kerugian')->nullable($value = true);
            $table->string('jenis_keterlambatan')->nullable($value = true);            
            $table->string('jumlah_kehilangan')->nullable($value = true);            
            $table->string('bukti_kehilangan')->nullable($value = true);            
            $table->string('bukti_kerusakan')->nullable($value = true);            
            $table->string('tanggal_bukti')->nullable($value = true);
            $table->string('jumlah_ganti_rugi')->nullable($value = true);            
            $table->string('beban_perusahaan')->nullable($value = true);            
            $table->string('beban_pegawai')->nullable($value = true);            
            $table->string('beban_mitra')->nullable($value = true);                 
            $table->string('status')->nullable($value = true);
            $table->string('ditambah_oleh')->nullable($value = true);
            $table->string('diubah_oleh')->nullable($value = true);
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
        Schema::dropIfExists('data_ganti_rugi');
    }
};
