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
        //creación de la tabla resenyas
        Schema::create('resenyas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bici')->nullable(true);
            $table->unsignedBigInteger('id_casco')->nullable(true);
            $table->string('nombreusuario',30);
            $table->decimal('estrellas',2,1)->default(0);
            $table->string('descripcion', 250);
            $table->string('tipo', 10);
            $table->timestamp('fecha')->useCurrent();
            $table->foreign('id_bici')->references('id')->on('bicicletas');
            $table->foreign('id_casco')->references('id')->on('cascos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resenyas');
    }
};
