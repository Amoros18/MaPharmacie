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
        Schema::create('pharmacie_medicaments', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pharmacie');
            $table->integer('id_medicament');
            $table->enum('statut',['Disponible','Non Disponible']);
            $table->integer('quantite');
            $table->timestamps();

            $table->foreign('id_pharmacie')->references('id')->on('pharmacies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_medicament')->references('id')->on('medicaments')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['id_pharmacie','id_medicament']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacie_medicaments');
    }
};
