<?php

use Illuminate\Database\Seeder;

class UnidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert([
            'nome' => 'ESF Central',
            'endereco' => 'Rua XV de Novembro - 761',
            'cnes' => '9231625',
        ]);
        
        DB::table('unidades')->insert([
            'nome' => 'ESF Colônia Francesa',
            'endereco' => 'Avenida Das Palmeiras - S/N',
            'cnes' => '2821958',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Dr. Jorge Amin Bacila',
            'endereco' => 'Rua Padre Anchieta - S/N',
            'cnes' => '3006069',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Faxinal Dos Quartins',
            'endereco' => 'Faxinal Dos Quartins',
            'cnes' => '2687259',
        ]);
        
        DB::table('unidades')->insert([
            'nome' => 'ESF Guarauninha',
            'endereco' => 'Guarauninha',
            'cnes' => '2687216',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Jardim Cristine',
            'endereco' => 'Rua Roberto Biel Bach - S/N',
            'cnes' => '7815557',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Pinheiral de Baixo',
            'endereco' => 'Pinheiral de Baixo',
            'cnes' => '2687232',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Queimadas',
            'endereco' => 'Queimadas',
            'cnes' => '2687232',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Rocio I',
            'endereco' => 'Gaspar Bertoni - S/N',
            'cnes' => '2687143',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Rocio II',
            'endereco' => 'João de Barro - S/N',
            'cnes' => '9862544',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Santa Rosa',
            'endereco' => 'Salvador Ramos - S/N',
            'cnes' => '7188447',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Vieiras',
            'endereco' => 'Vieiras',
            'cnes' => '2687178',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Vila Rosa',
            'endereco' => 'Padre Fernando Guarda - 208',
            'cnes' => '2687151',
        ]);
     
        DB::table('unidades')->insert([
            'nome' => 'ESF Vilinha',
            'endereco' => 'Vilinha',
            'cnes' => '2687208',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'ESF Witmarsum',
            'endereco' => 'Witmarsum',
            'cnes' => '2687275',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'Posto de Saúde de Boqueirão',
            'endereco' => 'Boqueirão',
            'cnes' => '2687224',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'Posto de Saúde de Colônia Maciel',
            'endereco' => 'Colônia Maciel',
            'cnes' => '2687194',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'Posto de Saúde de Poço Grande',
            'endereco' => 'Poço Grande',
            'cnes' => '2687267',
        ]);
        DB::table('unidades')->insert([
            'nome' => 'Posto de Saúde de Quero-Quero',
            'endereco' => 'Quero-Quero',
            'cnes' => '2687283',
        ]);

        DB::table('unidades')->insert([
            'nome' => 'Posto de Saúde de Santa Bárbara',
            'endereco' => 'Santa Bárbara',
            'cnes' => '2687240',
        ]);
        
    }
}
