<?php

use Illuminate\Database\Seeder;

class VacinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('vacinas')->insert([
                'vacina' => Str::random(10),
                'dose' => '1ª',
                'aplicacao' => 'Subcutânea',
            ]);
        }
    }
}
