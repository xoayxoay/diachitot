<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('name')->nullable();
            $table->tinyInteger('status')->index()->default('1')->comment('1 = active, 0 = banned')->unsigned();
            $table->string('avatar')->nullable()->default('["1","user"]')->comment('1 = in site, 0 = out site');
            $table->Integer('phone')->nullable()->unsigned();
            $table->string('address')->nullable();
            $table->string('cmnd_image')->nullable();
            $table->tinyInteger('lever')->index()->default('0')->comment('1 = admins, 2 = superadmin')->unsigned();
            $table->tinyInteger('verify')->default('0')->comment('1 = verify')->unsigned();
            $table->string('email_token')->nullable()->index();
            $table->rememberToken()->index();
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
        Schema::dropIfExists('users');
    }
}
