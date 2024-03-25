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
        Schema::create('tabelas', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('tabela_origens_id');
            $table->unsignedBigInteger('plano_id');
            $table->unsignedBigInteger('acomodacao_id');
            $table->unsignedBigInteger('faixa_etaria_id');
            $table->unsignedBigInteger('operadora_id');

            $table->boolean('coparticipacao');
            $table->boolean('odonto');
            $table->decimal('valor',8,2);
            $table->timestamps();

            
            $table->foreign('tabela_origens_id')->references('id')->on('tabela_origens')->onDelete('cascade');
            
            $table->foreign('plano_id')->references('id')->on('planos')->onDelete('cascade');
            $table->foreign('acomodacao_id')->references('id')->on('acomodacoes')->onDelete('cascade');
            $table->foreign('faixa_etaria_id')->references('id')->on('faixa_etarias')->onDelete('cascade');
            $table->foreign('operadora_id')->references('id')->on('operadoras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabelas');
    }
};
