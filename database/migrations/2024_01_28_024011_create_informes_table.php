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
        Schema::create('informes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('revision_id');
            $table->unsignedBigInteger('revisor_id');                        
            $table->date('fecha_informe');
            $table->boolean('cumplimiento');  

            $table->foreign('revision_id')->references('id')->on('revisions')->onDelete('cascade');
            $table->foreign('revisor_id')->references('id')->on('revisors')->onDelete('cascade');   

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informes');
    }
};
