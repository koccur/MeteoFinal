<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments',function (Blueprint $table){
            $table->increments('id');
            $table->string('commenter');
            $table->integer('article_id')->unsigned();
            $table->text('body');
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
