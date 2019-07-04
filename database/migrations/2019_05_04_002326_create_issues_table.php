<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assign_it_support')->nullable();
            $table->string('assign_it_ops')->nullable();
            $table->string('issue_id')->nullable();
            $table->integer('cat_id')->nullable();
            $table->integer('prio_id')->nullable();
            $table->integer('request_id')->nullable();
            $table->string('location')->nullable();
            $table->longText('prob_desc')->nullable();
            $table->longText('reason_desc')->nullable();
            $table->longText('solution_desc')->nullable();
            $table->integer('complete_by')->nullable();
            $table->dateTime('issue_date')->nullable();
            $table->dateTime('complete_date')->nullable();
            $table->tinyInteger('is_archive')->nullable();
            $table->enum('status',['RITADM','AITADM','ITSP','RITSP','AITSP','ITOPS', 'ITNP','CLOSE','CFUSER','SLITADM','SLITOPS','RT','ALS'])->nullable();
            $table->integer('dev_ser_num')->nullable();
            $table->string('other_device')->nullable();
            $table->integer('id_unit_kerja')->nullable();
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
        Schema::dropIfExists('issues');
    }
}
