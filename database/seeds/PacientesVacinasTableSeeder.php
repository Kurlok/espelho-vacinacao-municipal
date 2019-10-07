<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PacientesVacinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numVacinas = DB::table('vacinas')->count();
        $numPacientes = DB::table('pacientes')->count();
        $numUnidades = DB::table('unidades')->count();
        $numUsuarios = DB::table('users')->count();


        $faker = Faker::create('pt_BR');


        for ($j = 0; $j < $numVacinas-90; $j++) {

            
            for ($i = 0; $i < $numPacientes; $i++) {
                $dt = $faker->dateTimeBetween($startDate = '-50 years', $endDate = 'now');
                $date = $dt->format("Y-m-d");
                DB::table('pacientes_vacinas')->insert([
                    'fk_vacinas_id' => $j+1,
                    'fk_pacientes_id' => $i+1,
                    'fk_unidades_id' => random_int(1,$numUnidades),
                    'fk_users_id' => random_int(1,$numUsuarios),
                    'data_aplicacao' => $date
                ]);
            }
        }


    }
}
