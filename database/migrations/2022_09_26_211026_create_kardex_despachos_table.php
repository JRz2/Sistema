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
        Schema::create('kardex_despachos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('despacho_producto_id')->nullable();
            $table->unsignedBigInteger('supermarket_producto_id')->nullable();
            $table->unsignedBigInteger('planta_producto_id')->nullable();
            $table->unsignedBigInteger('kardex_id');
            $table->string('cantidad');
            $table->date('fecha');
            $table->string('tipo');
            $table->foreign('despacho_producto_id')->references('id')->on('despacho_productos')->onDelete('cascade');
            $table->foreign('supermarket_producto_id')->references('id')->on('supermarket_productos')->onDelete('cascade');
            $table->foreign('planta_producto_id')->references('id')->on('planta_productos')->onDelete('cascade');
            $table->foreign('kardex_id')->references('id')->on('kardexes')->onDelete('cascade');
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
        Schema::dropIfExists('kardex_despachos');
    }
};
