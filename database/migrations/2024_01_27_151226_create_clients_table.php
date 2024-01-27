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
        Schema::create('clients', function (Blueprint $table) {
            $table->string('dni', 20)->primary();
            $table->string('telefono', 20)->nullable(false);
            $table->string('pais', 100)->nullable();
            $table->string('cod_postal', 20)->nullable();
            $table->string('ciudad', 100)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->timestamps();

            $table->foreign('dni')
            ->references('dni')
            ->on('persona')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
