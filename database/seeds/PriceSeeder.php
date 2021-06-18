<?php

use Illuminate\Database\Seeder;
use App\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numbertype = [
            '234705',
            '234805',
            '234807',
            '234815',
            '234811',
            '234905',
            '234803',
            '234706',
            '234703',
            '234810',
            '234806',
            '234813',
            '234816',
            '234814',
            '234903',
            '234906',
            '234708',
            '234802',
            '234808',
            '234812',
            '234701',
            '234902',
            '234907',
            '234809',
            '234817',
            '234818',
            '234909',
            '234908',
            '234709',
            '2347027',
            '2347028',
            '2347029',
            '234819',
            '2347026',
            '2347025',
            '234704',
            '234707',
            '234804',
            '1',
            '7',
            '20',
            '27',
            '30',
            '31',
            '32',
            '33',
            '34',
            '36',
            '39',
            '40',
            '41',
            '43',
            '44',
            '45',
            '46',
            '47',
            '48',
            '49',
            '51',
            '52',
            '53',
            '54',
            '55',
            '56',
            '57',
            '58',
            '60',
            '61',
            '62',
            '63',
            '64',
            '65',
            '66',
            '81',
            '82',
            '84',
            '86',
            '90',
            '92',
            '93',
            '94',
            '98',
            '211',
            '212',
            '213',
            '216',
            '218',
            '220',
            '221',
            '222',
            '223',
            '224',
            '225',
            '226',
            '227',
            '228',
            '229',
            '230',
            '231',
            '232',
            '233',
            '235',
            '236',
            '237',
            '238',
            '239',
            '240',
            '241',
            '242',
            '243',
            '244',
            '245',
            '248',
            '249',
            '250',
            '251',
            '253',
            '254',
            '255',
            '256',
            '257',
            '258',
            '260',
            '261',
            '262',
            '263',
            '264',
            '265',
            '266',
            '267',
            '268',
            '269',
            '297',
            '298',
            '299',
            '350',
            '351',
            '352',
            '353',
            '354',
            '355',
            '356',
            '357',
            '358',
            '359',
            '370',
            '371',
            '372',
            '373',
            '374',
            '375',
            '376',
            '377',
            '378',
            '380',
            '381',
            '382',
            '385',
            '386',
            '387',
            '389',
            '420',
            '421',
            '423',
            '500',
            '501',
            '502',
            '503',
            '504',
            '505',
            '506',
            '507',
            '509',
            '590',
            '591',
            '592',
            '593',
            '594',
            '595',
            '596',
            '597',
            '598',
            '599',
            '673',
            '675',
            '676',
            '677',
            '678',
            '679',
            '680',
            '682',
            '685',
            '687',
            '852',
            '853',
            '855',
            '856',
            '880',
            '886',
            '960',
            '961',
            '962',
            '963',
            '964',
            '965',
            '966',
            '967',
            '968',
            '970',
            '971',
            '972',
            '973',
            '974',
            '975',
            '976',
            '977',
            '992',
            '993',
            '994',
            '995',
            '996',
            '998'
        ];

        $price = [
            '2.2',
            '2.2',
            '2.2',
            '2.2',
            '2.2',
            '2.2',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '1.9',
            '5',
            '5',
            '4',
            '4',
            '4',
            '4',
            '4',
            '4',
            '4',
            '5',
            '13',
            '10',
            '6',
            '5',
            '14',
            '18',
            '10',
            '8',
            '17',
            '17',
            '16',
            '20',
            '10',
            '15',
            '12',
            '6',
            '11',
            '10',
            '10',
            '20',
            '20',
            '8',
            '5',
            '7',
            '8',
            '10',
            '25',
            '7',
            '7',
            '12',
            '5',
            '8',
            '7',
            '7',
            '8',
            '8',
            '13',
            '12',
            '11',
            '19',
            '5',
            '5',
            '5',
            '7',
            '6',
            '12',
            '7',
            '10',
            '6',
            '10',
            '8',
            '8',
            '7',
            '10',
            '8',
            '7',
            '7',
            '11',
            '13',
            '7',
            '7',
            '7',
            '8',
            '9',
            '7',
            '6',
            '7',
            '4',
            '7',
            '7',
            '12',
            '7',
            '8',
            '13',
            '10',
            '8',
            '10',
            '6',
            '19',
            '6',
            '8',
            '8',
            '12',
            '7',
            '8',
            '7',
            '8',
            '10',
            '10',
            '7',
            '7',
            '6',
            '10',
            '9',
            '7',
            '6',
            '6',
            '6',
            '8',
            '7',
            '6',
            '8',
            '8',
            '7',
            '7',
            '14',
            '21',
            '6',
            '13',
            '17',
            '17',
            '7',
            '6',
            '7',
            '8',
            '15',
            '14',
            '7',
            '8',
            '10',
            '8',
            '6',
            '7',
            '15',
            '16',
            '7',
            '16',
            '7',
            '7',
            '7',
            '6',
            '7',
            '6',
            '8',
            '11',
            '13',
            '6',
            '10',
            '7',
            '8',
            '7',
            '10',
            '11',
            '8',
            '8',
            '6',
            '10',
            '10',
            '6',
            '10',
            '8',
            '7',
            '6',
            '11',
            '16',
            '7',
            '7',
            '7',
            '8',
            '5',
            '8',
            '6',
            '8',
            '6',
            '11',
            '6',
            '7',
            '7',
            '10',
            '5',
            '7',
            '8',
            '12',
            '7',
            '6',
            '7',
            '10',
            '8',
            '8',
            '10',
            '9',
            '13',
            '9',
            '8'
        ];
        for($i=0; $i< count($numbertype); $i++ ){
            Price::create([
                'numbertype' => $numbertype[$i],
                'price' => $price[$i],
            ]);
        }
       
    }
}