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
            for ($i=1; $i < 31; $i++) { 
                $table->string('item'.$i, 40)->nullable();
            }
            $table->float('med_elos')->nullable();
            $table->float('med_elo')->nullable();
            $table->float('med_w1')->nullable();
            $table->float('med_y')->nullable();
            for ($i=35; $i < 67; $i++) {
                $table->string('item'.$i, 20)->nullable();
            }
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
        Schema::dropIfExists('t_e_c_relatorios');
    }
};
