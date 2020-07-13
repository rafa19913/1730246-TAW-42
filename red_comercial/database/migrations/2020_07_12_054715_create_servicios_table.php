<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('id_servicio');
            $table->string('nombre');
            $table->float('precio');
            $table->boolean('tiempo_limitado');
            $table->date('fecha_limite');

            // Llave foreana relacionada en la tabla categorias_servicios (id_categoria_servicio)
            // para saber a que categoria pertenece
            $table->unsignedBigInteger('id_categoria_servicio');
            $table->foreign('id_categoria_servicio')->references('id_categoria_servicio')->on('categorias_servicios');

            // Llave foreana relacionada en la tabla empresas (id_empresa)
            // para saber a que empresa pertenece dicho servicio
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas');

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
        Schema::dropIfExists('servicios');
    }
}
