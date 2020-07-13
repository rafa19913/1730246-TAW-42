<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('password');

            // Llave foreana relacionada en la tabla Roles (id_rol)
            // para saber si es > Administrador, Empresario o Cliente
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('roles');
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
        Schema::dropIfExists('usuarios');
    }
}
