<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->string('author');
            $table->string('date');
            $table->string('image1');
            $table->longText('blog');
            $table->string('image2')->nullable();
            $table->string('meta_keyword');
            $table->longText('meta_description');
            $table->string('blog_url')->nullable();
            $table->longText('blog_description')->nullable();
            $table->string('twitter_url')->nullable();
            $table->longText('twitter_description')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
