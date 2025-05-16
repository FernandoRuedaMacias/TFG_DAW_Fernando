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
        //creación de la tabla users, está todo en inglés por laravel breeze,de lo contrario daría error, pasa lo mismo
        //con los timestamps (no se pueden quitar).
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('email', 250);
            $table->string('password', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
