<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
public function up()
{
Schema::create('images', function(Blueprint $table)
{
    $table->increments('id');
    $table->string('file');
    $table->string('destination_path');
    $table->string('filename');
    $table->string('caption');
//    $table->text('description');
    $table->integer('user_id');
    $table->integer('article_id');
    $table->timestamps();
    $table->foreign('user_id')->references('id')->on('users');
    $table->foreign('article_id')->references('id')->on('article');
});
}

public function down()
{
Schema::dropIfExists('images');
}}