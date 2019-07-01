<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvenPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inven_pembelian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_inventory_fk');
            $table->string('nama_perangkat');
            $table->string('unit_kerja');
            $table->string('nama_alat');
            $table->text('keperluan');
            $table->date('tgl_pembelian');
            $table->date('tgl_penyerahan');
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
        Schema::dropIfExists('inven_pembelian');
    }
}
