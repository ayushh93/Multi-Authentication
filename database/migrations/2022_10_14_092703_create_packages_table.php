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
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('subcategory_id')->nullable()->constrained('subcategories')->onDelete('SET NULL');
            $table->string('title');
            $table->string('image');
            $table->longText('description');
            $table->string('elevation');
            $table->string('season');
            $table->string('duration');
            $table->string('group_size');
            $table->string('accomodation');
            $table->string('difficulty');
            $table->string('map');
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
        Schema::dropIfExists('packages');
    }
};
