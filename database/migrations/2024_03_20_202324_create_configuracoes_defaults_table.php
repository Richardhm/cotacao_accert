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
        Schema::create('configuracoes_defaults', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plano_id')->nullable()->index();
            $table->foreign('plano_id')->references('id')->on('planos');

            $table->string("observacao01")->nullable();
            $table->string("observacao02")->nullable();
            $table->string("observacao03")->nullable();

            $table->string("coparticipacao_titulo_01")->nullable();
            $table->decimal("coparticipacao_valor_01",10,2)->nullable();

            $table->string("coparticipacao_titulo_02")->nullable();
            $table->decimal("coparticipacao_valor_02",10,2)->nullable();

            $table->string("coparticipacao_titulo_03")->nullable();
            $table->decimal("coparticipacao_valor_03",10,2)->nullable();

            $table->string("coparticipacao_titulo_04")->nullable();
            $table->decimal("coparticipacao_valor_04",10,2)->nullable();

            $table->string("coparticipacao_titulo_05")->nullable();
            $table->decimal("coparticipacao_valor_05",10,2)->nullable();

            $table->string("coparticipacao_titulo_06")->nullable();
            $table->decimal("coparticipacao_valor_06",10,2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracoes_defaults');
    }
};
