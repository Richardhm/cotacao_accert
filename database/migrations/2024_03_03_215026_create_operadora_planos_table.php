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
        Schema::create('operadora_planos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('operadora_id')->nullable()->index();
            $table->foreign('operadora_id')->references('id')->on('operadoras');

            $table->unsignedBigInteger('plano_id')->nullable()->index();
            $table->foreign('plano_id')->references('id')->on('planos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operadora_planos');
    }
};
