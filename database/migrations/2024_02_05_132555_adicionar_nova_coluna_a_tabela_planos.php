<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('planos', function (Blueprint $table) {
            $table->string('logo')->after('nome')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('planos', function (Blueprint $table) {
            $table->string('logo')->after('nome')->nullable();
        });
    }
};
