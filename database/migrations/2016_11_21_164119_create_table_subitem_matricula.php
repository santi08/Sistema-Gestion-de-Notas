<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubitemMatricula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subitem_matricula', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('matricula_id')->unsigned();
            $table->foreign('matricula_id')->references('id')->on('matriculas');
            $table->integer('subitem_id')->unsigned();
            $table->foreign('subitem_id')->references('id')->on('subitems');
            $table->double('nota')->nullable();
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
        Schema::drop('subitem_matricula');
    }
}
