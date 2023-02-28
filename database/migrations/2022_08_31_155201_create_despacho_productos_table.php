<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despacho_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('despacho_id');
            $table->unsignedBigInteger('producto_id');
            $table->string('salida');
            $table->string('fvencimiento');
            $table->string('devoluciones')->nullable();
            $table->foreign('despacho_id')->references('id')->on('despachos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('despacho_producto');
    }
};
