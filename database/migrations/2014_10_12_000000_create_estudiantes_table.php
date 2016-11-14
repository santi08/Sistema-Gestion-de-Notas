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
            $table->string('primerNombre');
            $table->string('segundoNombre');
            $table->string('primerApellido');
            $table->string('segundoApellido');
            $table->string('codigo');
<<<<<<< HEAD
            $table->string('email')->nullable();
=======
            $table->string('email')->nullable()->unique();
>>>>>>> 2c633c36c1076e46e041da647f04215a2abd48be
            $table->string('password');
            $table->integer('id_programaAcademico')->unsigned();
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
