<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          /*

          */
            $table->increments('idPedido');
            $table->integer('numeroPedido');
            $table->string('nombreCliente');
            $table->decimal('total', 8, 2);
            $table->string('status');
            $table->date('fecha');
            $table->string('metodoPago');
            $table->string('comprobantePago');
            $table->string('motivoCancelacion');
            $table->string('guia');
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
