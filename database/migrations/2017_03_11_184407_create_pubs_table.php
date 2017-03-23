<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pubs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->Integer('user_id')->index()->unsigned();
            $table->Integer('article_id')->index()->unsigned();
            $table->string('user_ip')->index();
            $table->string('type',10)->index();
            $table->Integer('comment_id')->index()->nullable()->comment('use for type = comment')->unsigned();
            $table->float('currency');
            $table->float('reference');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pubs');
    }
}
