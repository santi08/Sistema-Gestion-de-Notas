<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('secondname');
            $table->string('lastname');
            $table->string('secondlastname');
            $table->string('codigo');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('estado')->nullable()->default('1');
            $table->rememberToken();
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
        Schema::drop('estudiantes');
    }
}
