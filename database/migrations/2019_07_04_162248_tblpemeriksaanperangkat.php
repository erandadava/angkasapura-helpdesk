<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tblpemeriksaanperangkat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpemeriksaanperangkat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pengguna_pc')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('serial_number')->nullable();
            $table->date('tanggal_pengecekan')->nullable();
            $table->time('mulai_jam_pengecekan')->nullable();
            $table->datetime('selesai_jam_pengecekan')->nullable();
            $table->string('full_computer_name')->nullable();
            $table->boolean('join_domain')->default(0)->nullable();
            $table->boolean('update_kaspersky')->default(0)->nullable();
            $table->date('tanggal_update')->nullable();
            $table->enum('tipe_koneksi',['LAN','WIFI','NONE'])->default('NONE')->nullable();
            $table->string('tipe_ip')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('subnet_mask')->nullable();
            $table->string('gateway')->nullable();
            $table->string('dns1')->nullable();
            $table->string('dns2')->nullable();
            $table->string('dns3')->nullable();
            $table->string('ttd_it_senior')->nullable();
            $table->string('ttd_admin_aps')->nullable();
            $table->string('teknisi_aps')->nullable();
            $table->string('user')->nullable();
            $table->string('it_non_public')->nullable();
            $table->longText('foto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblpemeriksaanperangkat');
    }
}
