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
            $table->foreign('matricula_id')->references('id')->on('matriculas')->onDelete('cascade');
            $table->integer('subitem_id')->unsigned();
            $table->foreign('subitem_id')->references('id')->on('subitems')->onDelete('cascade');
            $table->double('nota')->nullable();
            $table->timestamps();
            $table->index('matricula_id', 'index_matricula');
            $table->index('subitem_id', 'index_subitem');
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
