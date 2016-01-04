<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Klas;
use Eduweb2\Libcore\Richting;

class KlasSeeder extends Seeder
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
        DB::table('klas')->truncate();
        $arr = array(
            array('klas' => '1La','klasnaam' => '1La'),
            array('klas' => '1Lb','klasnaam' => '1Lb'),
            array('klas' => '1Lc','klasnaam' => '1Lc'),
            array('klas' => '1Ld','klasnaam' => '1Ld'),
            array('klas' => '1Le','klasnaam' => '1Le'),
            array('klas' => '1Lf','klasnaam' => '1Lf'),
            array('klas' => '1Lg','klasnaam' => '1Lg'),
            array('klas' => '1Ma','klasnaam' => '1Ma'),
            array('klas' => '1Mb','klasnaam' => '1Mb'),
            array('klas' => '1Mc','klasnaam' => '1Mc'),
            array('klas' => '1Md','klasnaam' => '1Md'),
            array('klas' => '1Me','klasnaam' => '1Me'),
            array('klas' => '1Mf','klasnaam' => '1Mf'),
            array('klas' => '1Mg','klasnaam' => '1Mg'),
            array('klas' => '1Mh','klasnaam' => '1Mh'),
            array('klas' => '2GL','klasnaam' => '2GL'),
            array('klas' => '2La','klasnaam' => '2La'),
            array('klas' => '2Lb','klasnaam' => '2Lb'),
            array('klas' => '2Lc','klasnaam' => '2Lc'),
            array('klas' => '2Ld','klasnaam' => '2Ld'),
            array('klas' => '2Le','klasnaam' => '2Le'),
            array('klas' => '2Lf','klasnaam' => '2Lf'),
            array('klas' => '2Ma','klasnaam' => '2Ma'),
            array('klas' => '2Mb','klasnaam' => '2Mb'),
            array('klas' => '2Mc','klasnaam' => '2Mc'),
            array('klas' => '2Md','klasnaam' => '2Md'),
            array('klas' => '2Me','klasnaam' => '2Me'),
            array('klas' => '2Mf','klasnaam' => '2Mf'),
            array('klas' => '2Mg','klasnaam' => '2Mg'),
            array('klas' => '2Mh','klasnaam' => '2Mh'),
            array('klas' => '3E','klasnaam' => '3E'),
            array('klas' => '3EWa','klasnaam' => '3EWa'),
            array('klas' => '3EWb','klasnaam' => '3EWb'),
            array('klas' => '3GLW','klasnaam' => '3GLW'),
            array('klas' => '3Ha','klasnaam' => '3Ha'),
            array('klas' => '3Hb','klasnaam' => '3Hb'),
            array('klas' => '3HW','klasnaam' => '3HW'),
            array('klas' => '3L','klasnaam' => '3L'),
            array('klas' => '3LWa','klasnaam' => '3LWa'),
            array('klas' => '3LWb','klasnaam' => '3LWb'),
            array('klas' => '3LWc','klasnaam' => '3LWc'),
            array('klas' => '3LWd','klasnaam' => '3LWd'),
            array('klas' => '3LWe','klasnaam' => '3LWe'),
            array('klas' => '3Wa','klasnaam' => '3Wa'),
            array('klas' => '3Wb','klasnaam' => '3Wb'),
            array('klas' => '3Wc','klasnaam' => '3Wc'),
            array('klas' => '4E','klasnaam' => '4E'),
            array('klas' => '4EW','klasnaam' => '4EW'),
            array('klas' => '4GL','klasnaam' => '4GL'),
            array('klas' => '4GLW','klasnaam' => '4GLW'),
            array('klas' => '4Ha','klasnaam' => '4Ha'),
            array('klas' => '4Hb','klasnaam' => '4Hb'),
            array('klas' => '4HW','klasnaam' => '4HW'),
            array('klas' => '4L','klasnaam' => '4L'),
            array('klas' => '4LWa','klasnaam' => '4LWa'),
            array('klas' => '4LWb','klasnaam' => '4LWb'),
            array('klas' => '4LWc','klasnaam' => '4LWc'),
            array('klas' => '4LWd','klasnaam' => '4LWd'),
            array('klas' => '4Wa','klasnaam' => '4Wa'),
            array('klas' => '4Wb','klasnaam' => '4Wb'),
            array('klas' => '4Wc','klasnaam' => '4Wc'),
            array('klas' => '4Wd','klasnaam' => '4Wd'),
            array('klas' => '4We','klasnaam' => '4We'),
            array('klas' => '5ETa','klasnaam' => '5ETa'),
            array('klas' => '5ETb','klasnaam' => '5ETb'),
            array('klas' => '5EW','klasnaam' => '5EW'),
            array('klas' => '5GL','klasnaam' => '5GL'),
            array('klas' => '5GW','klasnaam' => '5GW'),
            array('klas' => '5H','klasnaam' => '5H'),
            array('klas' => '5HW','klasnaam' => '5HW'),
            array('klas' => '5LT','klasnaam' => '5LT'),
            array('klas' => '5LWa','klasnaam' => '5LWa'),
            array('klas' => '5LWb','klasnaam' => '5LWb'),
            array('klas' => '5LWEa','klasnaam' => '5LWEa'),
            array('klas' => '5LWEb','klasnaam' => '5LWEb'),
            array('klas' => '5TWEa','klasnaam' => '5TWEa'),
            array('klas' => '5TWEb','klasnaam' => '5TWEb'),
            array('klas' => '5WEWa','klasnaam' => '5WEWa'),
            array('klas' => '5WEWb','klasnaam' => '5WEWb'),
            array('klas' => '6ET','klasnaam' => '6ET'),
            array('klas' => '6EW','klasnaam' => '6EW'),
            array('klas' => '6GL','klasnaam' => '6GL'),
            array('klas' => '6GW','klasnaam' => '6GW'),
            array('klas' => '6Ha','klasnaam' => '6Ha'),
            array('klas' => '6Hb','klasnaam' => '6Hb'),
            array('klas' => '6HW','klasnaam' => '6HW'),
            array('klas' => '6LT','klasnaam' => '6LT'),
            array('klas' => '6LWa','klasnaam' => '6LWa'),
            array('klas' => '6LWb','klasnaam' => '6LWb'),
            array('klas' => '6LWE','klasnaam' => '6LWE'),
            array('klas' => '6TW','klasnaam' => '6TW'),
            array('klas' => '6TWEa','klasnaam' => '6TWEa'),
            array('klas' => '6TWEb','klasnaam' => '6TWEb'),
            array('klas' => '6WEWa','klasnaam' => '6WEWa'),
            array('klas' => '6WEWb','klasnaam' => '6WEWb'),
            array('klas' => '6WEWc','klasnaam' => '6WEWc'),
            array('klas' => 'weg','klasnaam' => 'weg')
        );
        $klassen = factory(Klas::class, count($arr))->create();
        $richtingen = Richting::all();
        for ($i = 0; $i < count($klassen);++$i) {
            $klassen[$i]["code"]=$arr[$i]["klas"];
            $klassen[$i]["naam"]=$arr[$i]["klasnaam"];
            for ($j = count($richtingen)-1;$j>=0;--$j) {
                if (strlen($richtingen[$j]["naam"]) <= strlen($klassen[$i]["code"])) {
                    if (substr($klassen[$i]["code"], 0, strlen($richtingen[$j]["naam"])) == $richtingen[$j]["naam"]) {
                        $klassen[$i]["richting_id"] = $richtingen[$j]["id"];
                        break;
                    }
                }
            }
            $klassen[$i]->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
