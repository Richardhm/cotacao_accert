<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperadorasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operadoras = [
            ['nome' => 'Hapvida', 'logo' => 'hapvida-logo.png'],
            ['nome' => 'Unimed', 'logo' => 'unimed.png'],
            ['nome' => 'Humana', 'logo' => 'humana.png'],
            ['nome' => 'Bradesco', 'logo' => 'bradesco.png'],
            ['nome' => 'Plano Brasil', 'logo' => 'plano-brasil.png'],
            ['nome' => 'Sulamericana', 'logo' => 'sulamerica.jpg'],
        ];

        DB::table('operadoras')->insert($operadoras);
    }
}
