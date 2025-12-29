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
    Schema::create('favoritos', function (Blueprint $table) {
        $table->id();
        // Ligações (Chaves estrangeiras)
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('vegetal_id')->constrained('vegetais')->onDelete('cascade');
        $table->timestamps();
        
        // Garante que o usuário não favorite o mesmo item 2 vezes
        $table->unique(['user_id', 'vegetal_id']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
};
