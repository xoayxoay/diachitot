<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->Integer('user_id')->index();
            $table->string('category')->index();
            $table->string('image')->nullable();
            $table->Integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->string('coordinates')->nullable();
            $table->Integer('start_1')->default('0');
            $table->Integer('start_2')->default('0');
            $table->Integer('start_3')->default('0');
            $table->Integer('start_4')->default('0');
            $table->Integer('start_5')->default('0');
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
        Schema::dropIfExists('articles');
    }
}
