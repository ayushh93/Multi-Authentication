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
        Schema::create('cost_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('package_id')->constrained('packages')->onDelete('cascade'); 
            $table->longtext('includes')->nullable();
            $table->longtext('excludes')->nullable();
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
        Schema::dropIfExists('cost_descriptions');
    }
};