<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperadoraPlanosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operadoraPlanos = [
            ['operadora_id' => 1, 'plano_id' => 1],
            ['operadora_id' => 1, 'plano_id' => 2],
            ['operadora_id' => 1, 'plano_id' => 3],
            ['operadora_id' => 1, 'plano_id' => 4],
            ['operadora_id' => 1, 'plano_id' => 5],
        ];

        DB::table('operadora_planos')->insert($operadoraPlanos);
    }
}
