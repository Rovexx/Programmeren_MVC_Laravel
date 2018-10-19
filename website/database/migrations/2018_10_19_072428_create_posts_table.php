<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('make');
            $table->string('model');
            $table->string('color');
            $table->year('year');
            $table->mediumInteger('mileage');
            $table->string('fuel');
            $table->tinyInteger('doors');
            $table->decimal('engineCapacity', 2, 1);
            $table->smallInteger('weight');
            $table->string('transmission');
            $table->tinyInteger('gears');
            $table->string('plate', 11);
            $table->mediumInteger('price');
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
        Schema::dropIfExists('posts');
    }
}
