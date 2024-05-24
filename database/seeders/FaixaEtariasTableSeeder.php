<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaixaEtariasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faixas = [
            ['nome' => '0 a 18'],
            ['nome' => '19 a 23'],
            ['nome' => '24 a 28'],
            ['nome' => '29 a 33'],
            ['nome' => '34 a 38'],
            ['nome' => '39 a 43'],
            ['nome' => '44 a 48'],
            ['nome' => '49 a 53'],
            ['nome' => '54 a 58'],
            ['nome' => '59+']
        ];

        DB::table('faixa_etarias')->insert($faixas);
    }
}
