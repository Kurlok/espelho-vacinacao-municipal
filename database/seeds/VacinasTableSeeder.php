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
        //         'dose' => 'Dose 1', 'status' => 'Ativa',
        //     ]);
        // }

        //BCG
        DB::table('vacinas')->insert([
            'vacina' => 'BCG',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);

        //Hepatite B
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Dose 1', 'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Reforço',
            'status' => 'Ativa',
        ]);

        //Poliomelite
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '1º Reforço',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '2º Reforço',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => '3º Reforço',
            'status' => 'Ativa',
        ]);

        
        // Tetra Viral
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 4',
            'status' => 'Ativa',
        ]);

        // VORH (Vacina Oral de Rotavírus Humano)
        DB::table('vacinas')->insert([
            'vacina' => 'VORH',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VORH',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);

        //Hepatite A
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-A',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);


        // Prevenar
        DB::table('vacinas')->insert([
            'vacina' => 'Prevenar',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Prevenar',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Prevenar',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Prevenar',
            'dose' => 'Reforço',
            'status' => 'Ativa',
        ]);

        // Tríplice Viral - VTV
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);

        //Dupla Viral
        DB::table('vacinas')->insert([
            'vacina' => 'Dupla Viral',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);

        //HPV
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);

        //Antissarampo
        DB::table('vacinas')->insert([
            'vacina' => 'Antissarampo',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);

        //Tríplice bacteriana - DPT
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Dose 4',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Reforço 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DPT',
            'dose' => 'Reforço 2',
            'status' => 'Ativa',
        ]);

        //Tríplice Bacteriana Acelular do Adulto - DTpa
        DB::table('vacinas')->insert([
            'vacina' => 'DTpa',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DTpa',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DTpa',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);

        //Dupla adulto (difteria e tétano) – DT
        DB::table('vacinas')->insert([
            'vacina' => 'DT',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DT',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DT',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'DT',
            'dose' => 'Reforço 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'DT',
            'dose' => 'Reforço 2',
            'status' => 'Ativa',
        ]);

        //Vacina Haemophilus influenzae tipo b – Hib
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);

        //Vacina Meningocócica C
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Reforço 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Reforço 2',
            'status' => 'Ativa',
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'Mening. Única',
            'dose' => 'Única',
            'status' => 'Ativa',
        ]);

        //Vacina Inativada Poliomielite - VIP
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);

        //Pentavalente
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);

        //Febre Amarela
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 4',
            'status' => 'Ativa',
        ]);

        //Influenza
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 3',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 4',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 5',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 6',
            'status' => 'Ativa',
        ]);

        //Outras
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '01',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '02',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '03',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '04',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '05',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '06',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '07',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '08',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '09',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '10',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '11',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '12',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '13',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '14',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '15',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '16',
            'status' => 'Ativa',
        ]);

        //Antirrábica
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '0 dia',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '03º dia',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '07º dia',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '14º dia',
            'status' => 'Ativa',
        ]);

        //Varicela
        DB::table('vacinas')->insert([
            'vacina' => 'Varicela',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Varicela',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);

        //Vacina pneumocócica 23
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumo. 23',
            'dose' => 'Dose 1',
            'status' => 'Ativa',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumo. 23',
            'dose' => 'Dose 2',
            'status' => 'Ativa',
        ]);
    }
}
