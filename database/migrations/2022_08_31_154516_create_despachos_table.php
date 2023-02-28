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
        Schema::create('despachos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('distribuidor_id');
            $table->date('fecha');                              
            $table->string('entradacanasta')->nullable();
            $table->string('salidacanasta')->nullable();
           // $table->enum('estado',[1, 2])->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('distribuidor_id')->references('id')->on('distribuidors')->onDelete('cascade');
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
        Schema::dropIfExists('despachos');
    }
};
