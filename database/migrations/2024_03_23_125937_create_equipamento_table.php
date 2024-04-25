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
            $table->float('v_rede')->nullable();
            $table->float('v_com')->nullable();
            $table->float('banc_res')->nullable();
            $table->float('corr_dir_alta')->nullable();
            $table->float('corr_dir_baixa')->nullable();
            $table->float('v_dir_freio')->nullable();
            $table->float('corr_el_alta')->nullable();
            $table->float('corr_el_baixa')->nullable();
            $table->float('v_el_freio')->nullable();
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
