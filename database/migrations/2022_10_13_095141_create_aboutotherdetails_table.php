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
        Schema::create('aboutotherdetails', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title1');
            $table->string('value1');
            $table->string('title2');
            $table->string('value2');
            $table->string('title3');
            $table->string('value3');
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
        Schema::dropIfExists('aboutotherdetails');
    }
};
