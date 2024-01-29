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
        Schema::create('portafolios', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('carga_academica_id')->unique();
            $table->enum('tipo_portafolio', ['teorico', 'practico'])->notNullable();

            $table->foreign('carga_academica_id')->references('id')->on('carga_academicas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portafolios');
    }
};
