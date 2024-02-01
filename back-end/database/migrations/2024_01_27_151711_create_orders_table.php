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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status', 100);
            $table->date('delivery_date'); 
            $table->date('request_date');
            $table->decimal('total_price', 10, 2);
            $table->string('client_dni', 20);

            // Clave foránea para el cliente que realizó el pedido
            $table->foreign('client_dni')->references('dni')->on('clients')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
