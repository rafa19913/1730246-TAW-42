<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->float('precio');
            $table->integer('stock');
            $table->integer('cnt_min_parar_de_vender'); //Cantidad minima para dejar de vender en base al stock
            
            // Llave foreana relacionada en la tabla id_categorias_productos (id_categoria_producto)
            // para saber a que categoria pertenece
            $table->unsignedBigInteger('id_categoria_producto');
            $table->foreign('id_categoria_producto')->references('id_categoria_producto')->on('categorias_productos');

            // Llave foreana relacionada en la tabla empresas (id_empresa)
            // para saber a que empresa pertenece dicho producto
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
        Schema::dropIfExists('productos');
    }
}
