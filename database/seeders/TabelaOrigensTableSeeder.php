<?php

namespace Database\Seeders;

use Illuminate\Bus\DatabaseBatchRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TabelaOrigensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tabelaOrigens = [
            ['nome' => 'Anápolis', 'uf' => 'GO'],
            ['nome' => 'Goiania', 'uf' => 'GO'],
            ['nome' => 'Brasilia', 'uf' => 'DF'],
            ['nome' => 'Rio Verde', 'uf' => 'GO'],
        ];

        DB::table('tabela_origens')->insert($tabelaOrigens);
    }
}
