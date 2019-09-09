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

        // for ($i = 0; $i < 2; $i++) {
        //     DB::table('vacinas')->insert([
        //         'vacina' => Str::random(10),
        //         'dose' => '1ª dose',
        //     ]);
        // }
        
        //BCG
        DB::table('vacinas')->insert([
            'vacina' => 'BCG',
            'dose' => '1ª dose',
        ]);

        //Hepatite B
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => '1ª dose',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => '2ª dose',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => '3ª dose',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Reforço',
        ]);

         //Poliomelite
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '1ª dose',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '2ª dose',
        ]);
        // DB::table('vacinas')->insert([
        //     'vacina' => 'Polio',
        //     'dose' => '3ª dose',
        // ]);
        // DB::table('vacinas')->insert([
        //     'vacina' => 'Polio',
        //     'dose' => 'Reforço',
        // ]);

        // //Tetra
        // DB::table('vacinas')->insert([
        //     'vacina' => 'Tetra',
        //     'dose' => '1ª dose',
        // ]);
        // DB::table('vacinas')->insert([
        //     'vacina' => 'Tetra',
        //     'dose' => '2ª dose',
        // ]);
        // DB::table('vacinas')->insert([
        //     'vacina' => 'Tetra',
        //     'dose' => '3ª dose',
        // ]);
        // DB::table('vacinas')->insert([
        //     'vacina' => 'Polio',
        //     'dose' => '4ª Dose',
        // ]);

    }
}
