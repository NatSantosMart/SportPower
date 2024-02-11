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
        Schema::create('clients', function (Blueprint $table) {
            $table->string('dni', 255)->unique();
            $table->string('phone', 20);
            $table->string('city', 100);
            $table->string('address', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('name', 100);
            $table->string('surnames', 100);

            $table->timestamps();
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
