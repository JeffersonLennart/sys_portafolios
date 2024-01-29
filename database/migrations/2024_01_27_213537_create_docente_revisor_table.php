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
        Schema::create('docente_revisor', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('revisor_id');
            $table->unsignedBigInteger('semestre_id')->nullable();

            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
            $table->foreign('revisor_id')->references('id')->on('revisors')->onDelete('cascade');
            $table->foreign('semestre_id')->references('id')->on('semestres')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente_revisor');
    }
};
