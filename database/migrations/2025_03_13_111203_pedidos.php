<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Creación de la tabla pedidos, son necesarios los timestamps , si no da error
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bici')->nullable(true);
            $table->unsignedBigInteger('id_casco')->nullable(true);
            $table->unsignedBigInteger('id_producto')->nullable(true);
            $table->unsignedBigInteger('id_usuario')->nullable(false);
            $table->timestamps();
            //Creación de claves foráneas que unen todas las tablas
            $table->foreign('id_bici')->references('id')->on('bicicletas');
            $table->foreign('id_casco')->references('id')->on('cascos');
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pedidos');
    }
};
