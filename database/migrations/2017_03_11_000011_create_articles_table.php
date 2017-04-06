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
            $table->string('name');
            $table->string('category')->index();
            $table->string('image')->nullable();
            $table->Integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->tinyInteger('discount')->default(0)->comment('1 = ON, 0 = OFF');
            $table->tinyInteger('status')->default(1)->comment('1 = ON, 0 = DEL');
            $table->string('general_code')->nullable()->comment('use when discount = 1');
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
