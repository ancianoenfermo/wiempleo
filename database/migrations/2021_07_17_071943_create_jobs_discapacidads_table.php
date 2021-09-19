<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsDiscapacidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_discapacidads', function (Blueprint $table) {
            $table->id();
            $table->string('orden');
            $table->dateTime('datePosted');
            $table->string('title');
            $table->text('excerpt')->nullable();
            $table->string('vacantes')->nullable();
            $table->boolean('ett')->nullable()->default('0');
            $table->string('salario')->nullable();
            $table->string('contrato')->nullable();
            $table->string('jornada')->nullable();
            $table->string('experiencia')->nullable();
            $table->string('listaTipos')->nullable();
            $table->text('jobUrl');
            $table->string('jobFuente');
            $table->string('autonomia');
            $table->string('provincia');
            $table->string('localidad');
            $table->index('autonomia');
            $table->index('provincia');
            $table->index('localidad');
            $table->index('orden');

            $table->unsignedBigInteger('tipodiscapacidad_id');
            $table->foreign('tipodiscapacidad_id')->references('id')->on('tipodiscapacidads');

            $table->unsignedBigInteger('autonomia_id');
            $table->foreign('autonomia_id')->references('id')->on('autonomiadiscapacidads');

            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provinciadiscapacidads');

            $table->unsignedBigInteger('localidad_id');
            $table->foreign('localidad_id')->references('id')->on('localidaddiscapacidads');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_discapacidads');
    }
}
