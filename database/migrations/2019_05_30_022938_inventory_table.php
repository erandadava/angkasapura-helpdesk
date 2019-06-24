<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id')->nullable();
            $table->string('pos_unit')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('nama_user')->nullable();
            $table->string('nama_perangkat')->nullable();
            $table->string('merk')->nullable();
            $table->string('type_alat')->nullable();
            $table->string('sernum')->nullable();
            $table->string('osver')->nullable();
            $table->string('os_license')->nullable();
            $table->string('os_status')->nullable();
            $table->string('av_type')->nullable();
            $table->string('av_license')->nullable();
            $table->string('ms_ver')->nullable();
            $table->string('ms_id')->nullable();
            $table->string('ms_status')->nullable();
            $table->string('tech_key')->nullable();
            $table->string('tech_kode')->nullable();
            $table->string('made_in')->nullable();
            $table->string('made_year')->nullable();
            $table->string('vendor_name')->nullable();
            $table->boolean('is_active')->nullable();
            $table->date('tgl_pembelian')->nullable();
            $table->date('tgl_penyerahan')->nullable();
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
        Schema::dropIfExists('inventory');
    }
}
