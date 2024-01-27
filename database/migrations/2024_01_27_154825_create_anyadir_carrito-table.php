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
        Schema::create('anyadir_carrito', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('dni_cliente');
            $table->primary(['dni_cliente', 'id_producto']);

            // Definición de las claves foráneas
            $table->foreign('dni_cliente')
                ->references('dni')
                ->on('Client');
               

            $table->foreign('id_producto')
                ->references('id')
                ->on('Product');
                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
