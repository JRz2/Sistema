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
        Schema::create('supermarket_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supermarket_id');
            $table->unsignedBigInteger('producto_id');
            $table->string('salida');
            $table->string('fvencimiento');
            $table->string('devoluciones')->nullable();
            $table->foreign('supermarket_id')->references('id')->on('supermarkets')->onDelete('cascade');
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
        Schema::dropIfExists('supermarket_productos');
    }
};
