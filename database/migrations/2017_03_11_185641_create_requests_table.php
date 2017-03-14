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
            $table->increments('id');
            $table->Integer('user_id')->index();
            $table->Integer('article_id')->index();
            $table->float('pay');
            $table->float('pay_views');
            $table->float('pay_comments');
            $table->float('pay_starts');
            $table->float('pay_phones');
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
