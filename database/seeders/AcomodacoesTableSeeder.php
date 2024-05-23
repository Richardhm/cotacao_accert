<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcomodacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('acomodacoes')->insert([
            ['nome' => 'Apartamento'],
            ['nome' => 'Enfermaria'],
            ['nome' => 'Ambulatorial'],
        ]);
    }
}
