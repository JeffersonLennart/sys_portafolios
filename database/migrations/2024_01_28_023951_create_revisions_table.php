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
        Schema::create('revisions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('portafolio_id');
            $table->unsignedBigInteger('revisor_id')->nullable();            
            $table->enum('numero_revision', [1, 2, 3])->notNullable();
            $table->date('fecha_revision');
            $table->text('observaciones')->nullable();

            $table->foreign('portafolio_id')->references('id')->on('portafolios')->onDelete('cascade');
            $table->foreign('revisor_id')->references('id')->on('revisors')->onDelete('set null');            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisions');
    }
};
