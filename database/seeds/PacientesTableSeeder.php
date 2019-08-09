<?php

use Illuminate\Database\Seeder;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert(
            [
                'nome' => 'Felipe Augusto Barcelos',
                'nome_mae' => 'Miriane Dombroski Barcelos',
                'sus' => '1234567890123',
                'data_nascimento' => '1990-02-16',
                'gestante' => 'Não',
                'sexo' => 'Masculino',
                'obito' => 'Sim',
                'localidade' => 'Centro',
                'telefone' => '(42) 93242-4213',
                'telefone_alternativo' => '(41) 99999-9999',
            ]
        );
    
        for ($i = 0; $i < 50; $i++) {
            DB::table('pacientes')->insert(
                [
                    'nome' => Str::random(20),
                    'nome_mae' => Str::random(20),
                    'sus' => Str::random(13),
                    'sexo' => 'Feminino',
                    'data_nascimento' => today(),
                    'gestante' => 'Não',
                    'obito' => 'Sim',
                    'localidade' => Str::random(20),
                    'telefone' => Str::random(15),
                    'telefone_alternativo' => Str::random(15),
                    'reacao_vacinal' => Str::random(50),

                ]
            );
        }
    }
}
