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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->string('url_imagen', 255)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('nombre', 100);
            $table->decimal('precio', 10, 2);
            $table->unsignedBigInteger('id_admin');
            $table->timestamps();

            $table->foreign('id_admin')
            ->references('id')
            ->on('admins')
            ->onUpdate('cascade')
            ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
