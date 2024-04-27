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
        Schema::create('t_e_c_relatorios', function (Blueprint $table) {
            $table->id();
            
            $table->integer('relatorio_id')->nullable();
            $table->float('med_elos')->nullable();
            $table->float('med_elo')->nullable();
            $table->float('med_w1')->nullable();
            $table->float('med_y')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_e_c_relatorios');
    }
};
