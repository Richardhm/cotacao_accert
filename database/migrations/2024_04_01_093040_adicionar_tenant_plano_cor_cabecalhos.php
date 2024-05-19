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
        Schema::table('cabecalhos', function (Blueprint $table) {

            $table->dropColumn(['nome']);

            $table->longText('header')->before('created_at')->nullable();
            $table->longText('footer')->before('created_at')->nullable();
            $table->string('cor')->before('created_at')->nullable();

            $table->unsignedBigInteger('tenant_id')->before('created_at')->nullable()->index();
            $table->foreign('tenant_id')->references('id')->on('tenants');

            $table->unsignedBigInteger('plano_id')->before('created_at')->nullable()->index();
            $table->foreign('plano_id')->references('id')->on('planos');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cabecalhos', function (Blueprint $table) {
            // Removendo a chave estrangeira para tenant_id
            $table->dropForeign(['tenant_id']);
            // Removendo a chave estrangeira para plano_id
            $table->dropForeign(['plano_id']);
            // Removendo a coluna cor
            $table->dropColumn('cor');
            // Removendo a coluna tenant_id
            $table->dropColumn('tenant_id');
            // Removendo a coluna plano_id
            $table->dropColumn('plano_id');

            $table->string('nome');


        });
    }
};
