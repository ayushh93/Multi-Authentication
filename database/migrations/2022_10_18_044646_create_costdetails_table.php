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
        Schema::create('costdetails', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('package_id')->constrained('packages')->onDelete('cascade'); 
            $table->integer('from');
            $table->integer('to');
            $table->integer('cost');
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
        Schema::dropIfExists('costdetails');
    }
};
