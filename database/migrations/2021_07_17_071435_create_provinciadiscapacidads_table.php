<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciadiscapacidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinciadiscapacidads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');

            $table->unsignedBigInteger('autonomia_id');
            $table->foreign('autonomia_id')->references('id')->on('autonomiadiscapacidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinciadiscapacidads');
    }
}
