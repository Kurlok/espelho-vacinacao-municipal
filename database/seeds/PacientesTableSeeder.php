<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for ($i=0;$i<102;$i++){
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
    //}
    $faker = Faker::create();
    
    for ($i = 0; $i < 100; $i++) {
            DB::table('pacientes')->insert(
                [
                    'nome' => $faker->name,
                    'nome_mae' => Str::random(20),
                    'sus' => Str::random(13),
                    'sexo' => 'Feminino',
                    'data_nascimento' => today(),
                    'gestante' => 'Não',
                    'obito' => 'Sim',
                    'localidade' => $faker->city,
                    'telefone' => Str::random(15),
                    'telefone_alternativo' => Str::random(15),
                    'observacoes' => Str::random(500),

                ]
            );
        }
    }
}
