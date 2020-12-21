<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BasicPart\Division;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::create( [
            'id'=>10,
            'name'=>'Barisal',
            'bn_name'=>'বরিশাল',
            'url'=>'www.barisaldiv.gov.bd'
        ] );



        Division::create( [
            'id'=>20,
            'name'=>'Chattagram',
            'bn_name'=>'চট্টগ্রাম',
            'url'=>'www.chittagongdiv.gov.bd'
        ] );



        Division::create( [
            'id'=>30,
            'name'=>'Dhaka',
            'bn_name'=>'ঢাকা',
            'url'=>'www.dhakadiv.gov.bd'
        ] );



        Division::create( [
            'id'=>35,
            'name'=>'Mymensingh',
            'bn_name'=>'ময়মনসিংহ',
            'url'=>'www.mymensinghdiv.gov.bd'
        ] );



        Division::create( [
            'id'=>40,
            'name'=>'Khulna',
            'bn_name'=>'খুলনা',
            'url'=>'www.khulnadiv.gov.bd'
        ] );



        Division::create( [
            'id'=>50,
            'name'=>'Rajshahi',
            'bn_name'=>'রাজশাহী',
            'url'=>'www.rajshahidiv.gov.bd'
        ] );



        Division::create( [
            'id'=>55,
            'name'=>'Rangpur',
            'bn_name'=>'রংপুর',
            'url'=>'www.rangpurdiv.gov.bd'
        ] );



        Division::create( [
            'id'=>60,
            'name'=>'Sylhet',
            'bn_name'=>'সিলেট',
            'url'=>'www.sylhetdiv.gov.bd'
        ] );
    }
}
