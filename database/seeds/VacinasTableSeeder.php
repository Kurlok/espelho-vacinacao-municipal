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
        //         'dose' => '1ª dose', 'status' => 'ativa',
        //     ]);
        // }

        //BCG
        DB::table('vacinas')->insert([
            'vacina' => 'BCG',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);

        //Hepatite B
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-A',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);

        //Hepatite B
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => '1ª dose', 'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Reforço',
            'status' => 'ativa',
        ]);

        //Poliomelite
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '1º Reforço',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '2º Reforço',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '3º Reforço',
            'status' => 'ativa',
        ]);

        // VORH (Vacina Oral de Rotavírus Humano)
        DB::table('vacinas')->insert([
            'vacina' => 'VORH',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VORH',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);

        // Prevenar
        DB::table('vacinas')->insert([
            'vacina' => 'Prev',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Prev',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Prev',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Prev',
            'dose' => 'Reforço',
            'status' => 'ativa',
        ]);

        // Tríplice Viral - VTV
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => 'Reforço',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);

        //Dupla Viral
        DB::table('vacinas')->insert([
            'vacina' => 'Dupla Viral',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);

        //HPV
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);

        //Antissarampo
        DB::table('vacinas')->insert([
            'vacina' => 'Antissarampo',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);

        //Tríplice bacteriana - DPT
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => '4ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => '1º reforço',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => '2º reforço',
            'status' => 'ativa',
        ]);

        //Tríplice Bacteriana Acelular do Adulto - dTpa
        DB::table('vacinas')->insert([
            'vacina' => 'dTpa',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dTpa',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dTpa',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);

        //Dupla adulto (difteria e tétano) – dT
        DB::table('vacinas')->insert([
            'vacina' => 'dT',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dT',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dT',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'dT',
            'dose' => '1º reforço',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dT',
            'dose' => '2º reforço',
            'status' => 'ativa',
        ]);

        //Vacina Haemophilus influenzae tipo b – Hib
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);

        //Vacina Meningocócica C
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => '1ª reforço',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => '2ª reforço',
            'status' => 'ativa',
        ]);

        //Vacina Inativada Poliomielite - VIP
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);

        //Pentavalente
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);

        //Febre Amarela
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => '4ª dose',
            'status' => 'ativa',
        ]);

        //Influenza
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => '3ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => '4ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => '5ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => '6ª dose',
            'status' => 'ativa',
        ]);

        //Antirrábica
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '0 dia',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '3º dia',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '7º dia',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '14º dia',
            'status' => 'ativa',
        ]);

        //Varicela
        DB::table('vacinas')->insert([
            'vacina' => 'Varicela',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Varicela',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);

        //Vacina pneumocócica 23
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumo. 23',
            'dose' => '1ª dose',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumo. 23',
            'dose' => '2ª dose',
            'status' => 'ativa',
        ]);

        //Outras

        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '01',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '02',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '03',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
             'dose' => '04',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '05',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '06',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '07',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '08',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '09',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '10',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '11',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '12',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '13',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '14',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '15',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '16',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '17',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras', 
            'dose' => '18',
            'status' => 'ativa',
        ]);
    }
}
