<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BasicPart\District;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::create( [
            'id'=>1,
            'geo_district_id'=>'19',
            'division_id'=>20,
            'name'=>'Comilla',
            'bn_name'=>'কুমিল্লা',
            'lat'=>'23.4682747',
            'lon'=>'91.1788135',
            'url'=>'www.comilla.gov.bd'
        ]);

        District::create( [
            'id'=>2,
            'geo_district_id'=>'30',
            'division_id'=>20,
            'name'=>'Feni',
            'bn_name'=>'ফেনী',
            'lat'=>'23.023231',
            'lon'=>'91.3840844',
            'url'=>'www.feni.gov.bd'
        ] );

        District::create( [
            'id'=>3,
            'geo_district_id'=>'12',
            'division_id'=>20,
            'name'=>'Brahamanbaria',
            'bn_name'=>'ব্রাহ্মণবাড়িয়া',
            'lat'=>'23.9570904',
            'lon'=>'91.1119286',
            'url'=>'www.brahmanbaria.gov.bd'
        ] );

        District::create( [
            'id'=>4,
            'geo_district_id'=>'84',
            'division_id'=>20,
            'name'=>'Rangamati',
            'bn_name'=>'রাঙ্গামাটি',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.rangamati.gov.bd'
        ] );

        District::create( [
            'id'=>5,
            'geo_district_id'=>'75',
            'division_id'=>20,
            'name'=>'Noakhali',
            'bn_name'=>'নোয়াখালী',
            'lat'=>'22.869563',
            'lon'=>'91.099398',
            'url'=>'www.noakhali.gov.bd'
        ] );

        District::create( [
            'id'=>6,
            'geo_district_id'=>'13',
            'division_id'=>20,
            'name'=>'Chandpur',
            'bn_name'=>'চাঁদপুর',
            'lat'=>'23.2332585',
            'lon'=>'90.6712912',
            'url'=>'www.chandpur.gov.bd'
        ] );

        District::create( [
            'id'=>7,
            'geo_district_id'=>'51',
            'division_id'=>20,
            'name'=>'Lakshmipur',
            'bn_name'=>'লক্ষ্মীপুর',
            'lat'=>'22.942477',
            'lon'=>'90.841184',
            'url'=>'www.lakshmipur.gov.bd'
        ] );

        District::create( [
            'id'=>8,
            'geo_district_id'=>'15',
            'division_id'=>20,
            'name'=>'Chittagong',
            'bn_name'=>'চট্টগ্রাম',
            'lat'=>'22.335109',
            'lon'=>'91.834073',
            'url'=>'www.chittagong.gov.bd'
        ] );

        District::create( [
            'id'=>9,
            'geo_district_id'=>'22',
            'division_id'=>20,
            'name'=>'Coxs Bazar',
            'bn_name'=>'কক্সবাজার',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.coxsbazar.gov.bd'
        ] );

        District::create( [
            'id'=>10,
            'geo_district_id'=>'46',
            'division_id'=>20,
            'name'=>'Khagrachhari',
            'bn_name'=>'খাগড়াছড়ি',
            'lat'=>'23.119285',
            'lon'=>'91.984663',
            'url'=>'www.khagrachhari.gov.bd'
        ] );

        District::create( [
            'id'=>11,
            'geo_district_id'=>'03',
            'division_id'=>20,
            'name'=>'Bandarban',
            'bn_name'=>'বান্দরবান',
            'lat'=>'22.1953275',
            'lon'=>'92.2183773',
            'url'=>'www.bandarban.gov.bd'
        ] );

        District::create( [
            'id'=>12,
            'geo_district_id'=>'88',
            'division_id'=>50,
            'name'=>'Sirajganj',
            'bn_name'=>'সিরাজগঞ্জ',
            'lat'=>'24.4533978',
            'lon'=>'89.7006815',
            'url'=>'www.sirajganj.gov.bd'
        ] );

        District::create( [
            'id'=>13,
            'geo_district_id'=>'76',
            'division_id'=>50,
            'name'=>'Pabna',
            'bn_name'=>'পাবনা',
            'lat'=>'23.998524',
            'lon'=>'89.233645',
            'url'=>'www.pabna.gov.bd'
        ] );

        District::create( [
            'id'=>14,
            'geo_district_id'=>'10',
            'division_id'=>50,
            'name'=>'Bogra',
            'bn_name'=>'বগুড়া',
            'lat'=>'24.8465228',
            'lon'=>'89.377755',
            'url'=>'www.bogra.gov.bd'
        ] );

        District::create( [
            'id'=>15,
            'geo_district_id'=>'81',
            'division_id'=>50,
            'name'=>'Rajshahi',
            'bn_name'=>'রাজশাহী',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.rajshahi.gov.bd'
        ] );

        District::create( [
            'id'=>16,
            'geo_district_id'=>'69',
            'division_id'=>50,
            'name'=>'Natore',
            'bn_name'=>'নাটোর',
            'lat'=>'24.420556',
            'lon'=>'89.000282',
            'url'=>'www.natore.gov.bd'
        ] );

        District::create( [
            'id'=>17,
            'geo_district_id'=>'38',
            'division_id'=>50,
            'name'=>'Joypurhat',
            'bn_name'=>'জয়পুরহাট',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.joypurhat.gov.bd'
        ] );

        District::create( [
            'id'=>18,
            'geo_district_id'=>'70',
            'division_id'=>50,
            'name'=>'Chapai Nawabganj',
            'bn_name'=>'চাঁপাইনবাবগঞ্জ',
            'lat'=>'24.5965034',
            'lon'=>'88.2775122',
            'url'=>'www.chapainawabganj.gov.bd'
        ] );

        District::create( [
            'id'=>19,
            'geo_district_id'=>'64',
            'division_id'=>50,
            'name'=>'Naogaon',
            'bn_name'=>'নওগাঁ',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.naogaon.gov.bd'
        ] );

        District::create( [
            'id'=>20,
            'geo_district_id'=>'41',
            'division_id'=>40,
            'name'=>'Jessore',
            'bn_name'=>'যশোর',
            'lat'=>'23.16643',
            'lon'=>'89.2081126',
            'url'=>'www.jessore.gov.bd'
        ] );

        District::create( [
            'id'=>21,
            'geo_district_id'=>'87',
            'division_id'=>40,
            'name'=>'Satkhira',
            'bn_name'=>'সাতক্ষীরা',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.satkhira.gov.bd'
        ] );

        District::create( [
            'id'=>22,
            'geo_district_id'=>'57',
            'division_id'=>40,
            'name'=>'Meherpur',
            'bn_name'=>'মেহেরপুর',
            'lat'=>'23.762213',
            'lon'=>'88.631821',
            'url'=>'www.meherpur.gov.bd'
        ] );

        District::create( [
            'id'=>23,
            'geo_district_id'=>'65',
            'division_id'=>40,
            'name'=>'Narail',
            'bn_name'=>'নড়াইল',
            'lat'=>'23.172534',
            'lon'=>'89.512672',
            'url'=>'www.narail.gov.bd'
        ] );

        District::create( [
            'id'=>24,
            'geo_district_id'=>'18',
            'division_id'=>40,
            'name'=>'Chuadanga',
            'bn_name'=>'চুয়াডাঙ্গা',
            'lat'=>'23.6401961',
            'lon'=>'88.841841',
            'url'=>'www.chuadanga.gov.bd'
        ] );

        District::create( [
            'id'=>25,
            'geo_district_id'=>'50',
            'division_id'=>40,
            'name'=>'Kushtia',
            'bn_name'=>'কুষ্টিয়া',
            'lat'=>'23.901258',
            'lon'=>'89.120482',
            'url'=>'www.kushtia.gov.bd'
        ] );

        District::create( [
            'id'=>26,
            'geo_district_id'=>'55',
            'division_id'=>40,
            'name'=>'Magura',
            'bn_name'=>'মাগুরা',
            'lat'=>'23.487337',
            'lon'=>'89.419956',
            'url'=>'www.magura.gov.bd'
        ] );

        District::create( [
            'id'=>27,
            'geo_district_id'=>'47',
            'division_id'=>40,
            'name'=>'Khulna',
            'bn_name'=>'খুলনা',
            'lat'=>'22.815774',
            'lon'=>'89.568679',
            'url'=>'www.khulna.gov.bd'
        ] );

        District::create( [
            'id'=>28,
            'geo_district_id'=>'01',
            'division_id'=>40,
            'name'=>'Bagerhat',
            'bn_name'=>'বাগেরহাট',
            'lat'=>'22.651568',
            'lon'=>'89.785938',
            'url'=>'www.bagerhat.gov.bd'
        ] );

        District::create( [
            'id'=>29,
            'geo_district_id'=>'44',
            'division_id'=>40,
            'name'=>'Jhenaidah',
            'bn_name'=>'ঝিনাইদহ',
            'lat'=>'23.5448176',
            'lon'=>'89.1539213',
            'url'=>'www.jhenaidah.gov.bd'
        ] );

        District::create( [
            'id'=>30,
            'geo_district_id'=>'42',
            'division_id'=>10,
            'name'=>'Jhalokati',
            'bn_name'=>'ঝালকাঠি',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.jhalakathi.gov.bd'
        ] );

        District::create( [
            'id'=>31,
            'geo_district_id'=>'78',
            'division_id'=>10,
            'name'=>'Patuakhali',
            'bn_name'=>'পটুয়াখালী',
            'lat'=>'22.3596316',
            'lon'=>'90.3298712',
            'url'=>'www.patuakhali.gov.bd'
        ] );

        District::create( [
            'id'=>32,
            'geo_district_id'=>'79',
            'division_id'=>10,
            'name'=>'Pirojpur',
            'bn_name'=>'পিরোজপুর',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.pirojpur.gov.bd'
        ] );

        District::create( [
            'id'=>33,
            'geo_district_id'=>'06',
            'division_id'=>10,
            'name'=>'Barisal',
            'bn_name'=>'বরিশাল',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.barisal.gov.bd'
        ] );

        District::create( [
            'id'=>34,
            'geo_district_id'=>'09',
            'division_id'=>10,
            'name'=>'Bhola',
            'bn_name'=>'ভোলা',
            'lat'=>'22.685923',
            'lon'=>'90.648179',
            'url'=>'www.bhola.gov.bd'
        ] );

        District::create( [
            'id'=>35,
            'geo_district_id'=>'04',
            'division_id'=>10,
            'name'=>'Barguna',
            'bn_name'=>'বরগুনা',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.barguna.gov.bd'
        ] );

        District::create( [
            'id'=>36,
            'geo_district_id'=>'91',
            'division_id'=>60,
            'name'=>'Sylhet',
            'bn_name'=>'সিলেট',
            'lat'=>'24.8897956',
            'lon'=>'91.8697894',
            'url'=>'www.sylhet.gov.bd'
        ] );

        District::create( [
            'id'=>37,
            'geo_district_id'=>'58',
            'division_id'=>60,
            'name'=>'Maulvibazar',
            'bn_name'=>'মৌলভীবাজার',
            'lat'=>'24.482934',
            'lon'=>'91.777417',
            'url'=>'www.moulvibazar.gov.bd'
        ] );

        District::create( [
            'id'=>38,
            'geo_district_id'=>'36',
            'division_id'=>60,
            'name'=>'Habiganj',
            'bn_name'=>'হবিগঞ্জ',
            'lat'=>'24.374945',
            'lon'=>'91.41553',
            'url'=>'www.habiganj.gov.bd'
        ] );

        District::create( [
            'id'=>39,
            'geo_district_id'=>'90',
            'division_id'=>60,
            'name'=>'Sunamganj',
            'bn_name'=>'সুনামগঞ্জ',
            'lat'=>'25.0658042',
            'lon'=>'91.3950115',
            'url'=>'www.sunamganj.gov.bd'
        ] );

        District::create( [
            'id'=>40,
            'geo_district_id'=>'68',
            'division_id'=>30,
            'name'=>'Narsingdi',
            'bn_name'=>'নরসিংদী',
            'lat'=>'23.932233',
            'lon'=>'90.71541',
            'url'=>'www.narsingdi.gov.bd'
        ] );

        District::create( [
            'id'=>41,
            'geo_district_id'=>'33',
            'division_id'=>30,
            'name'=>'Gazipur',
            'bn_name'=>'গাজীপুর',
            'lat'=>'24.0022858',
            'lon'=>'90.4264283',
            'url'=>'www.gazipur.gov.bd'
        ] );

        District::create( [
            'id'=>42,
            'geo_district_id'=>'86',
            'division_id'=>30,
            'name'=>'Shariatpur',
            'bn_name'=>'শরীয়তপুর',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.shariatpur.gov.bd'
        ] );

        District::create( [
            'id'=>43,
            'geo_district_id'=>'67',
            'division_id'=>30,
            'name'=>'Narayanganj',
            'bn_name'=>'নারায়ণগঞ্জ',
            'lat'=>'23.63366',
            'lon'=>'90.496482',
            'url'=>'www.narayanganj.gov.bd'
        ] );

        District::create( [
            'id'=>44,
            'geo_district_id'=>'93',
            'division_id'=>30,
            'name'=>'Tangail',
            'bn_name'=>'টাঙ্গাইল',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.tangail.gov.bd'
        ] );

        District::create( [
            'id'=>45,
            'geo_district_id'=>'48',
            'division_id'=>30,
            'name'=>'Kishoreganj',
            'bn_name'=>'কিশোরগঞ্জ',
            'lat'=>'24.444937',
            'lon'=>'90.776575',
            'url'=>'www.kishoreganj.gov.bd'
        ] );

        District::create( [
            'id'=>46,
            'geo_district_id'=>'56',
            'division_id'=>30,
            'name'=>'Manikganj',
            'bn_name'=>'মানিকগঞ্জ',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.manikganj.gov.bd'
        ] );

        District::create( [
            'id'=>47,
            'geo_district_id'=>'26',
            'division_id'=>30,
            'name'=>'Dhaka',
            'bn_name'=>'ঢাকা',
            'lat'=>'23.7115253',
            'lon'=>'90.4111451',
            'url'=>'www.dhaka.gov.bd'
        ] );

        District::create( [
            'id'=>48,
            'geo_district_id'=>'59',
            'division_id'=>30,
            'name'=>'Munshiganj',
            'bn_name'=>'মুন্সিগঞ্জ',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.munshiganj.gov.bd'
        ] );

        District::create( [
            'id'=>49,
            'geo_district_id'=>'82',
            'division_id'=>30,
            'name'=>'Rajbari',
            'bn_name'=>'রাজবাড়ী',
            'lat'=>'23.7574305',
            'lon'=>'89.6444665',
            'url'=>'www.rajbari.gov.bd'
        ] );

        District::create( [
            'id'=>50,
            'geo_district_id'=>'54',
            'division_id'=>30,
            'name'=>'Madaripur',
            'bn_name'=>'মাদারীপুর',
            'lat'=>'23.164102',
            'lon'=>'90.1896805',
            'url'=>'www.madaripur.gov.bd'
        ] );

        District::create( [
            'id'=>51,
            'geo_district_id'=>'35',
            'division_id'=>30,
            'name'=>'Gopalganj',
            'bn_name'=>'গোপালগঞ্জ',
            'lat'=>'23.0050857',
            'lon'=>'89.8266059',
            'url'=>'www.gopalganj.gov.bd'
        ] );

        District::create( [
            'id'=>52,
            'geo_district_id'=>'29',
            'division_id'=>30,
            'name'=>'Faridpur',
            'bn_name'=>'ফরিদপুর',
            'lat'=>'23.6070822',
            'lon'=>'89.8429406',
            'url'=>'www.faridpur.gov.bd'
        ] );

        District::create( [
            'id'=>53,
            'geo_district_id'=>'77',
            'division_id'=>55,
            'name'=>'Panchagarh',
            'bn_name'=>'পঞ্চগড়',
            'lat'=>'26.3411',
            'lon'=>'88.5541606',
            'url'=>'www.panchagarh.gov.bd'
        ] );

        District::create( [
            'id'=>54,
            'geo_district_id'=>'27',
            'division_id'=>55,
            'name'=>'Dinajpur',
            'bn_name'=>'দিনাজপুর',
            'lat'=>'25.6217061',
            'lon'=>'88.6354504',
            'url'=>'www.dinajpur.gov.bd'
        ] );

        District::create( [
            'id'=>55,
            'geo_district_id'=>'52',
            'division_id'=>55,
            'name'=>'Lalmonirhat',
            'bn_name'=>'লালমনিরহাট',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.lalmonirhat.gov.bd'
        ] );

        District::create( [
            'id'=>56,
            'geo_district_id'=>'73',
            'division_id'=>55,
            'name'=>'Nilphamari',
            'bn_name'=>'নীলফামারী',
            'lat'=>'25.931794',
            'lon'=>'88.856006',
            'url'=>'www.nilphamari.gov.bd'
        ] );

        District::create( [
            'id'=>57,
            'geo_district_id'=>'32',
            'division_id'=>55,
            'name'=>'Gaibandha',
            'bn_name'=>'গাইবান্ধা',
            'lat'=>'25.328751',
            'lon'=>'89.528088',
            'url'=>'www.gaibandha.gov.bd'
        ] );

        District::create( [
            'id'=>58,
            'geo_district_id'=>'94',
            'division_id'=>55,
            'name'=>'Thakurgaon',
            'bn_name'=>'ঠাকুরগাঁও',
            'lat'=>'26.0336945',
            'lon'=>'88.4616834',
            'url'=>'www.thakurgaon.gov.bd'
        ] );

        District::create( [
            'id'=>59,
            'geo_district_id'=>'85',
            'division_id'=>55,
            'name'=>'Rangpur',
            'bn_name'=>'রংপুর',
            'lat'=>'25.7558096',
            'lon'=>'89.244462',
            'url'=>'www.rangpur.gov.bd'
        ] );

        District::create( [
            'id'=>60,
            'geo_district_id'=>'49',
            'division_id'=>55,
            'name'=>'Kurigram',
            'bn_name'=>'কুড়িগ্রাম',
            'lat'=>'25.805445',
            'lon'=>'89.636174',
            'url'=>'www.kurigram.gov.bd'
        ] );

        District::create( [
            'id'=>61,
            'geo_district_id'=>'89',
            'division_id'=>35,
            'name'=>'Sherpur',
            'bn_name'=>'শেরপুর',
            'lat'=>'25.0204933',
            'lon'=>'90.0152966',
            'url'=>'www.sherpur.gov.bd'
        ] );

        District::create( [
            'id'=>62,
            'geo_district_id'=>'61',
            'division_id'=>35,
            'name'=>'Mymensingh',
            'bn_name'=>'ময়মনসিংহ',
            'lat'=>NULL,
            'lon'=>NULL,
            'url'=>'www.mymensingh.gov.bd'
        ] );

        District::create( [
            'id'=>63,
            'geo_district_id'=>'39',
            'division_id'=>35,
            'name'=>'Jamalpur',
            'bn_name'=>'জামালপুর',
            'lat'=>'24.937533',
            'lon'=>'89.937775',
            'url'=>'www.jamalpur.gov.bd'
        ] );

        District::create( [
            'id'=>64,
            'geo_district_id'=>'72',
            'division_id'=>35,
            'name'=>'Netrakona',
            'bn_name'=>'নেত্রকোণা',
            'lat'=>'24.870955',
            'lon'=>'90.727887',
            'url'=>'www.netrokona.gov.bd'
        ] );
    }
}
