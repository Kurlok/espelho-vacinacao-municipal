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
        //         'dose' => 'Dose 1', 'status' => 'ativa',
        //     ]);
        // }

        //BCG
        DB::table('vacinas')->insert([
            'vacina' => 'BCG',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);

        //Hepatite B
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Dose 1', 'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Dose 3',
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
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => 'Dose 3',
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

        
        // Tetra Viral
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 4',
            'status' => 'ativa',
        ]);

        // VORH (Vacina Oral de Rotavírus Humano)
        DB::table('vacinas')->insert([
            'vacina' => 'VORH',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VORH',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);

        //Hepatite A
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-A',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);


        // Prevenar
        DB::table('vacinas')->insert([
            'vacina' => 'Prevenar',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Prevenar',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Prevenar',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Prevenar',
            'dose' => 'Reforço',
            'status' => 'ativa',
        ]);

        // Tríplice Viral - VTV
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);

        //Dupla Viral
        DB::table('vacinas')->insert([
            'vacina' => 'Dupla Viral',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);

        //HPV
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);

        //Antissarampo
        DB::table('vacinas')->insert([
            'vacina' => 'Antissarampo',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);

        //Tríplice bacteriana - DPT
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Dose 4',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Reforço 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Reforço 2',
            'status' => 'ativa',
        ]);

        //Tríplice Bacteriana Acelular do Adulto - DTpa
        DB::table('vacinas')->insert([
            'vacina' => 'DTpa',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DTpa',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DTpa',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);

        //Dupla adulto (difteria e tétano) – DT
        DB::table('vacinas')->insert([
            'vacina' => 'DT',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DT',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DT',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'DT',
            'dose' => 'Reforço 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DT',
            'dose' => 'Reforço 2',
            'status' => 'ativa',
        ]);

        //Vacina Haemophilus influenzae tipo b – Hib
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);

        //Vacina Meningocócica C
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Reforço 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Reforço 2',
            'status' => 'ativa',
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'Mening. Única',
            'dose' => 'Única',
            'status' => 'ativa',
        ]);

        //Vacina Inativada Poliomielite - VIP
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);

        //Pentavalente
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);

        //Febre Amarela
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 4',
            'status' => 'ativa',
        ]);

        //Influenza
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 3',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 4',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 5',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 6',
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

        //Antirrábica
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '0 dia',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '03º dia',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '07º dia',
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
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Varicela',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);

        //Vacina pneumocócica 23
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumo. 23',
            'dose' => 'Dose 1',
            'status' => 'ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumo. 23',
            'dose' => 'Dose 2',
            'status' => 'ativa',
        ]);
    }
}
