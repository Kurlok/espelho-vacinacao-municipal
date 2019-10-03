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
        $faker = Faker::create('pt_BR');

        $numUsuarios = DB::table('users')->count();

        for ($i = 0; $i < 500; $i++) {
            $gender = $faker->randomElement(['male', 'female']);
            if ($gender == 'male') {
                $sexo = 'Masculino';
            } else {
                $sexo = 'Feminino';
            }
            $dt = $faker->dateTimeBetween($startDate = '-100 years', $endDate = 'now');
            $date = $dt->format("Y-m-d");

            DB::table('pacientes')->insert(
                [
                    'nome' => $faker->name($gender),
                    'nome_mae' => $faker->name('female'),
                    'sus' => $faker->numerify('###########'),
                    'sexo' => $sexo,
                    'data_nascimento' => $date,
                    'gestante' => 'Não',
                    'obito' => $faker->randomElement(['Sim', 'Não']),
                    'localidade' => $faker->city(),
                    'telefone' =>  $faker->numerify('(##) #####-####'),
                    'telefone_alternativo' =>  $faker->numerify('(##) #####-####'),
                    'observacoes' => $faker->sentence($nbWords = 10, $variableNbWords = true),
                    'fk_users_id' => random_int(1,$numUsuarios),

                ]
            );
        }
    }
}
