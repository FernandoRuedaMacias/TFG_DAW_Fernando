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
        //creación de la tabla cascos
        Schema::create('cascos', function (Blueprint $table) {
            $table->id();
            $table->string('tamanyo', 100);
            $table->string('color', 25);
            $table->decimal('precio',5,2);
            $table->string('imagen',250);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cascos');
    }
};
