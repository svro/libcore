<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Periode;
use Eduweb2\Libcore\Toetsenlijst;

class PeriodeSeeder extends Seeder
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
        DB::table('periode')->truncate();
        DB::table('periode_toetsenlijst')->truncate();

        $periodes = factory(Periode::class, 4)->create();
        $periodes[0]["code"]="m1";
        $periodes[0]["gewicht"]=100;
        $periodes[1]["code"]="t1";
        $periodes[1]["gewicht"]=100;
        $periodes[2]["code"]="m2";
        $periodes[2]["gewicht"]=100;
        $periodes[3]["code"]="t2";
        $periodes[3]["gewicht"]=100;

        foreach ($periodes as $periode) {
            $periode->save();
        }
/*
        $toetsenlijsten = Toetsenlijst::all();
        $periodes = Periode::all();
        for ($i=0;$i<count($toetsenlijsten);++$i) {
            for ($j=0;$j<count($periodes);++$j) {
                $toetsenlijsten[$i]->periodes()->save($periodes[$j]);
                $toetsenlijsten[$i]->save();
            }
        }
*/
        //$lesopdrachten[$lesopdrachtindex]->leerkrachten()->save(Leerkracht::where('code',$arr[$i]["naamcode"])->first());

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
