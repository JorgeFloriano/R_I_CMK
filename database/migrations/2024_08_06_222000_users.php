<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function(Blueprint $table) {
            $table->id();
            $table->string('name', 10);
            $table->string('surname', 10)->nullable();
            $table->string('function', 30);
            $table->string('email', 50);
            $table->string('password', 200);
            $table->dateTime('last_loguin')->nullable();
            $table->tinyInteger('type')->default(2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::drop('users');
    }
};
