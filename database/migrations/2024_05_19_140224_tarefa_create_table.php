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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();            
            $table->string('titulo');
            $table->text('descricao'); 
            $table->dateTime('inicio_em'); 
            $table->dateTime('fim_em')->nullable(); 
            $table->foreignId('projeto_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes(); // adiciona coluna "deleted_at"
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
