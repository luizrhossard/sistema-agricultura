<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vegetais', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('clima');
            $table->integer('tempo_plantio_dias');
            $table->float('profundidade_plantio_cm');
            $table->float('distancia_entre_plantas_cm');
            $table->float('umidade_solo_percentual');
            $table->text('descricao')->nullable();
            $table->timestamps(); // Cria: created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vegetais');
    }
};
