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
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id();
            $table->boolean('finalizado')->default(0);
            $table->integer('equipamento_id');
            $table->date('mes');
            $table->text('obs')->nullable();
            $table->string('stat_insp')->nullable();
            $table->string('stat_equip')->nullable();
            $table->string('ressalva')->nullable();
            $table->string('n_tec1')->nullable();
            $table->string('f_tec1')->nullable();
            $table->date('d_tec1')->nullable();
            $table->time('h_i_tec1')->nullable();
            $table->time('h_f_tec1')->nullable();
            $table->text('sign_tec1')->nullable();
            $table->string('n_tec2')->nullable();
            $table->string('f_tec2')->nullable();
            $table->date('d_tec2')->nullable();
            $table->time('h_i_tec2')->nullable();
            $table->time('h_f_tec2')->nullable();
            $table->text('sign_tec2')->nullable();
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
        Schema::dropIfExists('relatorios');
    }
};
