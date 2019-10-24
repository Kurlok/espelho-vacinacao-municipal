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

        //BCG
        DB::table('vacinas')->insert([
            'vacina' => 'BCG',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 0,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 30, 
            'inicio_maximo_meses' => 0, 
            'inicio_maximo_anos' => 0,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
        ]);

        //Hepatite B
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Dose 1', 
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 0,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 30, 
            'inicio_maximo_meses' => 0, 
            'inicio_maximo_anos' => 0,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 0,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 0, 
            'inicio_maximo_meses' => 0, 
            'inicio_maximo_anos' => 0,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 1,
            'intervalo_recomendado_anos' => 0,
            'vacina_exigida_id' => 2,

        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 0,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 0, 
            'inicio_maximo_meses' => 0, 
            'inicio_maximo_anos' => 0,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 5,
            'intervalo_recomendado_anos' => 0,
            'vacina_exigida_id' => 3,

        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-B',
            'dose' => 'Reforço 1',
            'status' => 'Ativo',
        ]);

        //Poliomelite
        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'Polio',
            'dose' => 'Reforço 1',
            'status' => 'Ativo',
        ]);

        //VOP
        DB::table('vacinas')->insert([
            'vacina' => 'VoP',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 15,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 11, 
            'inicio_maximo_anos' => 4,
            
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'VoP',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 15,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 11, 
            'inicio_maximo_anos' => 4,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 3,
            'vacina_exigida_id' => 10,
        ]);

        
        // Tetra Viral
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tetra',
            'dose' => 'Dose 4',
            'status' => 'Ativo',
        ]);

        // VORH (Vacina Oral de Rotavírus Humano)
        DB::table('vacinas')->insert([
            'vacina' => 'VORH',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
            'inicio_minimo_dias' =>15,
            'inicio_minimo_meses' => 1,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 15, 
            'inicio_maximo_meses' => 3, 
            'inicio_maximo_anos' => 0,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
        ]);
        
        DB::table('vacinas')->insert([
            'vacina' => 'VORH',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 15,
            'inicio_minimo_meses' => 3,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 7, 
            'inicio_maximo_anos' => 0,
            'intervalo_recomendado_dias' => 60,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
            'vacina_exigida_id' => 16,
        ]);

        //Hepatite A
        DB::table('vacinas')->insert([
            'vacina' => 'Hep-A',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 15,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 11, 
            'inicio_maximo_anos' => 4,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
        ]);


        // Pneumocócica 10 (DAprev)
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumocócica 10',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 2,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 11, 
            'inicio_maximo_anos' => 4,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumocócica 10',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 2,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 11, 
            'inicio_maximo_anos' => 4,
            'intervalo_recomendado_dias' => 60,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
            'vacina_exigida_id' => 19,
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'Pneumocócica 10',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumocócica 10',
            'dose' => 'Reforço',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 2,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 11, 
            'inicio_maximo_anos' => 4,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 12,
            'intervalo_recomendado_anos' => 0,
            'vacina_exigida_id' => 20,
        ]);

        // Tríplice Viral - VTV
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Tríplice Viral',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);

        //Dupla Viral
        DB::table('vacinas')->insert([
            'vacina' => 'Dupla Viral',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);

        //HPV
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 0,
            'inicio_minimo_anos' => 9,
            'inicio_maximo_dias' => 0, 
            'inicio_maximo_meses' => 0, 
            'inicio_maximo_anos' => 14,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 0,
            'inicio_minimo_anos' => 9,
            'inicio_maximo_dias' => 0, 
            'inicio_maximo_meses' => 0, 
            'inicio_maximo_anos' => 14,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 6,
            'intervalo_recomendado_anos' => 0,
            'vacina_exigida_id' => 27,
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'HPV',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);

        //Antissarampo
        DB::table('vacinas')->insert([
            'vacina' => 'Antissarampo',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);

        //Tríplice bacteriana - dTp
        DB::table('vacinas')->insert([
            'vacina' => 'dTp',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 15,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 11, 
            'inicio_maximo_anos' => 29,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dTp',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 15,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 11, 
            'inicio_maximo_anos' => 6,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
            'vacina_exigida_id' => 27,
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dTp',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dTp',
            'dose' => 'Dose 4',
            'status' => 'Ativo',
        ]);

        //Reforço da Penta
        DB::table('vacinas')->insert([
            'vacina' => 'dTp',
            'dose' => 'Reforço 1',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 15,
            'inicio_minimo_anos' => 0,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 11, 
            'inicio_maximo_anos' => 6,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'dTp',
            'dose' => 'Reforço 2',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 0,
            'inicio_minimo_anos' => 4,
            'inicio_maximo_dias' => 29, 
            'inicio_maximo_meses' => 11, 
            'inicio_maximo_anos' => 6,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
            'vacina_exigida_id' => 35,
        ]);

        //Tríplice Bacteriana Acelular do Adulto - DTpa
        DB::table('vacinas')->insert([
            'vacina' => 'dTpa',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dTpa',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dTpa',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);

        //Dupla adulto (difteria e tétano) – DT
        DB::table('vacinas')->insert([
            'vacina' => 'dT',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 0,
            'inicio_minimo_anos' => 7,
            'inicio_maximo_dias' => 0, 
            'inicio_maximo_meses' => 0, 
            'inicio_maximo_anos' => 0,
            'intervalo_recomendado_dias' => 0,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dT',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 0,
            'inicio_minimo_anos' => 7,
            'inicio_maximo_dias' => 0, 
            'inicio_maximo_meses' => 0, 
            'inicio_maximo_anos' => 0,
            'intervalo_recomendado_dias' => 60,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
            'vacina_exigida_id' => 40,
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dT',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
            'inicio_minimo_dias' => 0,
            'inicio_minimo_meses' => 0,
            'inicio_minimo_anos' => 7,
            'inicio_maximo_dias' => 0, 
            'inicio_maximo_meses' => 0, 
            'inicio_maximo_anos' => 0,
            'intervalo_recomendado_dias' => 60,
            'intervalo_recomendado_meses' => 0,
            'intervalo_recomendado_anos' => 0,
            'vacina_exigida_id' => 41,
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'dT',
            'dose' => 'Reforço 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'dT',
            'dose' => 'Reforço 2',
            'status' => 'Ativo',
        ]);

        //Vacina Haemophilus influenzae tipo b – Hib
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Hib',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);

        //Vacina Meningocócica C
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Reforço 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Mening. C',
            'dose' => 'Reforço 2',
            'status' => 'Ativo',
        ]);

        DB::table('vacinas')->insert([
            'vacina' => 'Mening. Única',
            'dose' => 'Única',
            'status' => 'Ativo',
        ]);

        //Vacina Inativada Poliomielite - VIP
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'VIP',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);

        //Pentavalente
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pentavalente',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);

        //Febre Amarela
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Febre Amarela',
            'dose' => 'Dose 4',
            'status' => 'Ativo',
        ]);

        //Influenza
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 3',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 4',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 5',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Influenza',
            'dose' => 'Dose 6',
            'status' => 'Ativo',
        ]);

        //Outras
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '01',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '02',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '03',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '04',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '05',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '06',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '07',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '08',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '09',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '10',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '11',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '12',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '13',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '14',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '15',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Outras',
            'dose' => '16',
            'status' => 'Ativo',
        ]);

        //Antirrábica
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '0 dia',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '03º dia',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '07º dia',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Antirrábica',
            'dose' => '14º dia',
            'status' => 'Ativo',
        ]);

        //Varicela
        DB::table('vacinas')->insert([
            'vacina' => 'Varicela',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Varicela',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);

        //Vacina pneumocócica 23
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumo. 23',
            'dose' => 'Dose 1',
            'status' => 'Ativo',
        ]);
        DB::table('vacinas')->insert([
            'vacina' => 'Pneumo. 23',
            'dose' => 'Dose 2',
            'status' => 'Ativo',
        ]);
    }
}
