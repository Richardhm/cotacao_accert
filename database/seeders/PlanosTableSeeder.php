<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planos = [
            ['nome' => 'Pessoa Fisica', 'logo' => 'hapvida-logo.png'],
            ['nome' => 'Adesão Allcare', 'logo' => 'allcare.png'],
            ['nome' => 'Adesão Alter', 'logo' => 'alter.png'],
            ['nome' => 'Adesão Qualicorp', 'logo' => 'qualicorp.png'],
            ['nome' => 'Super Simples', 'logo' => 'hapvida-logo.png'],
        ];

        DB::table('planos')->insert($planos);
    }
}
