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
            $table->integer('id_pemilik_perangkat')->nullable();
            $table->string('nama_perangkat')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('nama_user')->nullable();
            $table->string('merk')->nullable();
            $table->string('type_alat')->nullable();
            $table->string('sernum')->nullable();
            $table->string('made_in')->nullable();
            $table->string('made_year')->nullable();
            $table->float('condition')->nullable();
            $table->string('nama_perangkat_full')->nullable();
            $table->string('join_domain')->nullable();
            $table->string('update_kasp')->nullable();
            $table->string('ip_addr')->nullable();
            $table->string('mask')->nullable();
            $table->string('gateway')->nullable();
            $table->string('dns1')->nullable();
            $table->string('dns2')->nullable();
            $table->string('dns3')->nullable();
            $table->string('ip_type')->nullable();
            $table->string('conn_type')->nullable();
            $table->string('mac_addr')->nullable();
            $table->boolean('is_active')->nullable();
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
