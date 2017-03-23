<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->Integer('user_id')->index()->unsigned();
            $table->Integer('article_id')->index()->unsigned();
            $table->float('pay')->index()->unsigned();
            $table->float('pay_views')->unsigned();
            $table->float('pay_comments')->unsigned();
            $table->float('pay_starts')->unsigned();
            $table->float('pay_phones')->unsigned();
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
        Schema::dropIfExists('requests');
    }
}
