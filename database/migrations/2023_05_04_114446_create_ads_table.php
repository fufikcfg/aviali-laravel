<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('price');

            $table->integer('category_id')->unsigned();
            $table->integer('status_id')->unsigned();

            $table->text('description');
            $table->string('contact');

            $table->integer('user_creat_id');

            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreign('status_id')->on('statuses')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
