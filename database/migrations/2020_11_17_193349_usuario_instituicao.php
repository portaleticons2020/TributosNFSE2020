<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login')->unique();
            $table->string('cpf')->unique();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->integer('idinstituicao');
            $table->integer('nivel');
            $table->integer('bloqueado');
            $table->rememberToken();
            $table->timestamps();});

            //trabalhando relacionamento
            

            

}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
