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
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('url_image', 255)->nullable();
            $table->text('description');
            $table->string('client_dni', 20);

            $table->foreign('client_dni')
                  ->references('dni')
                  ->on('clients')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
