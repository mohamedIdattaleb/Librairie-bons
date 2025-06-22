<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ligne_bons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bon_id')->constrained()->onDelete('cascade');
            $table->string('designation');
            $table->string('numero_serie')->nullable();
            $table->string('redevance')->nullable();
            $table->integer('ancien_cpt')->nullable();
            $table->integer('nouveau_cpt')->nullable();
            $table->integer('quantite')->nullable();
            $table->decimal('prix_unitaire', 10, 2)->nullable();
            $table->decimal('total_ht', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_bons');
    }
};
