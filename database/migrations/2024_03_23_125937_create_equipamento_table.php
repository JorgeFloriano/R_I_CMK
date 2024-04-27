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
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string('n_serie', 250)->nullable();
            $table->string('n_cliente', 50)->nullable();
            $table->string('modelo', 50);
            $table->integer('capacidade');
            $table->string('fabricante', 50);
            $table->date('last_progr')->nullable();
            $table->date('next_progr')->nullable();
            $table->integer('periodicidade')->nullable();
            $table->string('tipo', 50);
            $table->string('predio', 50)->nullable();
            $table->string('area', 50)->nullable();
            $table->string('setor', 50)->nullable();
            $table->boolean('ativo');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamentos');
    }
};
