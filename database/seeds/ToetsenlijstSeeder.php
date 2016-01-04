<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Toetsenlijst;
use Eduweb2\Libcore\Toetsenlijsttype;
use Eduweb2\Libcore\Lesopdracht;
use Eduweb2\Libcore\Periode;

class ToetsenlijstSeeder extends Seeder
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
        DB::table('toetsenlijst')->truncate();
        DB::table('periode_toetsenlijst')->truncate();

        // voor elke lesopdracht 1 DW en 1 EX per semester?
        $lesopdrachten=Lesopdracht::all();
        $toetsenlijsttypes=Toetsenlijsttype::all();
        // 2 semesters
        $toetsenlijst = factory(Toetsenlijst::class, 2*count($toetsenlijsttypes)*count($lesopdrachten))->create();

        $toetsenlijsten = Toetsenlijst::all();
        $periodes = Periode::all();
        /*for ($i=0;$i<count($toetsenlijsten);++$i) {
            for ($j=0;$j<count($periodes);++$j) {
                $toetsenlijsten[$i]->periodes()->save($periodes[$j]);
                $toetsenlijsten[$i]->save();
            }
        }*/

        for ($i = 0; $i < count($lesopdrachten);++$i) {
            for ($k=0;$k<2;++$k) {
                for ($j = 0; $j < count($toetsenlijsttypes);++$j) {
                    $toetsenlijst[4*$i+2*$k+$j]['toetsenlijsttype_id'] = $toetsenlijsttypes[$j]["id"];
                    $toetsenlijst[4*$i+2*$k+$j]['lesopdracht_id'] = $lesopdrachten[$i]["id"];
                    $toetsenlijst[4*$i+2*$k+$j]->periodes()->save($periodes[$k*2+$j]);
                    if ($j==1) $toetsenlijst[4*$i+2*$k+$j]->periodes()->save($periodes[$k*2]);
                    $toetsenlijst[4*$i+2*$k+$j]->save();
                }
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
