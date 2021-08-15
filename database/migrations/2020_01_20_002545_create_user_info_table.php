<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned();
            
            $table->integer('age');
            
            $table->integer('gender_id');
            
            
            $table->string('location');
            $table->string('bio');

            // Temporary, until we enable chatting. Pf.
            $table->string('twitter');
            $table->string('discord');
            $table->string('tumblr');
            $table->string('email');


            $table->dateTime('last_active');

        });
        Schema::table('user_infos', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
