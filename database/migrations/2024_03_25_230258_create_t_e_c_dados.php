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
        Schema::create('t_e_c_dados', function (Blueprint $table) {
            $table->id();
            $table->integer('equipamento_id');
            $table->float('nom_elos')->nullable();
            $table->float('max_elos')->nullable();
            $table->float('nom_elo')->nullable();
            $table->float('min_elo')->nullable();
            $table->float('nom_w1')->nullable();
            $table->float('max_w1')->nullable();
            $table->float('nom_y')->nullable();
            $table->float('min_y')->nullable();
            $table->float('v_rede')->nullable();
            $table->float('v_com')->nullable();
            $table->float('banc_res')->nullable();
            $table->float('corr_dir_alta')->nullable();
            $table->float('corr_dir_baixa')->nullable();
            $table->float('v_dir_freio')->nullable();
            $table->float('corr_el_alta')->nullable();
            $table->float('corr_el_baixa')->nullable();
            $table->float('v_el_freio')->nullable();
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
        Schema::dropIfExists('t_e_c_dados');
    }
};
