<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeIp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('publish_id');
            $table->foreign('publish_id')->references('id')->on('publish');
            $table->integer('ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip_likes');
    }
}
