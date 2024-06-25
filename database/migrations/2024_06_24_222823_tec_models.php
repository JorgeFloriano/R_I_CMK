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
        Schema::create('tec_models', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->string('fabricante')->nullable();
            $table->float('nom_elos')->nullable();
            $table->float('max_elos')->nullable();
            $table->float('nom_elo')->nullable();
            $table->float('min_elo')->nullable();
            $table->float('nom_w1')->nullable();
            $table->float('max_w1')->nullable();
            $table->float('nom_y')->nullable();
            $table->float('min_y')->nullable();
            $table->float('v_com')->nullable();
            $table->float('corr_alta')->nullable();
            $table->float('corr_baixa')->nullable();
            $table->float('v_freio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tec_models');
    }
};
