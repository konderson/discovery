<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publish', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('category_id');
            $table->integer('author_id')->nullable();
            $table->integer('c_like')->nullable();
            $table->integer('c_view')->nullable();
            $table->timestamp('date')->nullable();
            $table->integer('coast')->nullable();
            $table->integer('cordinate1')->nullable();
            $table->integer('cordinate2')->nullable();
            $table->text('descriotion')->nullable();
            $table->boolean('iscecked')->nullable();
            $table->string('img')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publish');
    }
}
