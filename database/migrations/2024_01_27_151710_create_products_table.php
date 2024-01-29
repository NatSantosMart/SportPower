<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->decimal('price', 10, 2);
            $table->string('admin_dni', 20);
            $table->string('url_image', 255)->nullable();
            $table->text('description')->nullable();

            $table->timestamps();

            $table->foreign('admin_dni')
                  ->references('dni')
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
