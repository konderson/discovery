<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteTableViewCount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_view', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('count');
            $table->unsignedBigInteger('publish_id');
            $table->foreign('publish_id')->references('id')->on('publish');
            $table->string('ip');
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
        Schema::dropIfExists('ip_view');
    }
}
