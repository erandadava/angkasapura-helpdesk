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
            $table->string('issue_id')->nullable();
            $table->integer('cat_id')->nullable();
            $table->integer('prio_id')->nullable();
            $table->integer('request_id')->nullable();
            $table->string('location')->nullable();
            $table->longText('prob_desc')->nullable();
            $table->longText('reason_desc')->nullable();
            $table->integer('complete_by')->nullable();
            $table->dateTime('issue_date')->nullable();
            $table->dateTime('complete_date')->nullable();
            $table->tinyInteger('is_archive')->nullable();
            $table->softDeletes();
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
