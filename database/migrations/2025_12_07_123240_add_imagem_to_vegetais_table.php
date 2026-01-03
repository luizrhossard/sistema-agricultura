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
        Schema::table('vegetais', function (Blueprint $table) {
            // Adiciona a coluna imagem, permitindo ser nula (opcional)
            $table->string('imagem')->nullable()->after('categoria');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vegetais', function (Blueprint $table) {
            //
        });
    }
};
