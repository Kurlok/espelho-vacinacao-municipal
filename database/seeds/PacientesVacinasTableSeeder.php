<?php

use Illuminate\Database\Seeder;

class PacientesVacinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($j = 0; $j < 2; $j++) {

            for ($i = 0; $i < 6; $i++) {
                DB::table('pacientes_vacinas')->insert([
                    'fk_vacinas_id' => $j+1,
                    'fk_pacientes_id' => $i+1,
                    'data_aplicacao' => today(),
                ]);
            }
        }


    }
}
