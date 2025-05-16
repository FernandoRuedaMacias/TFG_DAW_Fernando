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
    //creación de la tabla bicicletas
    {
        Schema::create('bicicletas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('tipo', 100);
            $table->string('medidas', 100);
            $table->string('color', 25);
            $table->decimal('peso',3,1);
            $table->decimal('precio',5,2);
            $table->string('imagen',250);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bicicletas');
    }
};
