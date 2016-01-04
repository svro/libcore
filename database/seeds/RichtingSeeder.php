<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Richting;

class RichtingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('richting')->truncate();
        $arr = $lln_klassen = array(
            array('administratievegroep' => '6246','klasnaam' => '1L'),
            array('administratievegroep' => '6246','klasnaam' => '1M'),
            array('administratievegroep' => '20091','klasnaam' => '2GL'),
            array('administratievegroep' => '20096','klasnaam' => '2L'),
            array('administratievegroep' => '20098','klasnaam' => '2M'),
            array('administratievegroep' => '32563','klasnaam' => '3E'),
            array('administratievegroep' => '20619','klasnaam' => '3GL'),
            array('administratievegroep' => '32565','klasnaam' => '3H'),
            array('administratievegroep' => '32566','klasnaam' => '3L'),
            array('administratievegroep' => '32567','klasnaam' => '3W'),
            array('administratievegroep' => '32918','klasnaam' => '4E'),
            array('administratievegroep' => '21303','klasnaam' => '4GL'),
            array('administratievegroep' => '32967','klasnaam' => '4H'),
            array('administratievegroep' => '32920','klasnaam' => '4L'),
            array('administratievegroep' => '32921','klasnaam' => '4W'),
            array('administratievegroep' => '21981','klasnaam' => '5ET'),
            array('administratievegroep' => '21982','klasnaam' => '5EW'),
            array('administratievegroep' => '21983','klasnaam' => '5GL'),
            array('administratievegroep' => '21985','klasnaam' => '5GW'),
            array('administratievegroep' => '33121','klasnaam' => '5H'),
            array('administratievegroep' => '21986','klasnaam' => '5LT'),
            array('administratievegroep' => '21988','klasnaam' => '5LW'),
            array('administratievegroep' => '21987','klasnaam' => '5LWE'),
            array('administratievegroep' => '21990','klasnaam' => '5TWE'),
            array('administratievegroep' => '21994','klasnaam' => '5WEW'),
            array('administratievegroep' => '22343','klasnaam' => '6ET'),
            array('administratievegroep' => '22344','klasnaam' => '6EW'),
            array('administratievegroep' => '22345','klasnaam' => '6GL'),
            array('administratievegroep' => '22347','klasnaam' => '6GW'),
            array('administratievegroep' => '33122','klasnaam' => '6H'),
            array('administratievegroep' => '22348','klasnaam' => '6LT'),
            array('administratievegroep' => '22350','klasnaam' => '6LW'),
            array('administratievegroep' => '22349','klasnaam' => '6LWE'),
            array('administratievegroep' => '22353','klasnaam' => '6TW'),
            array('administratievegroep' => '22352','klasnaam' => '6TWE'),
            array('administratievegroep' => '22356','klasnaam' => '6WEW')
        );
        $richtingen = factory(Richting::class, count($arr))->create();
        for ($i = 0; $i < count($richtingen);++$i) {
            $richtingen[$i]["code"]=$arr[$i]["administratievegroep"];
            $richtingen[$i]["naam"]=$arr[$i]["klasnaam"];
            $richtingen[$i]->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
