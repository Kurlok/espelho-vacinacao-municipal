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
        for ($i = 0; $i < 3; $i++) {

            DB::table('pacientes_vacinas')->insert([
                'fk_vacinas_id' => $i+1,
                'fk_pacientes_id' => 1,
                'data_aplicacao' => today(),
            ]);
        }

        for ($i = 0; $i < 3; $i++) {
            DB::table('pacientes_vacinas')->insert([
                'fk_vacinas_id' => rand(1, 3),
                'fk_pacientes_id' => rand(2, 10),
                'data_aplicacao' => today(),
            ]);
        }
    }
}
