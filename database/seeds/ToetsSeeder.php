<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Toetsenlijst;
use Eduweb2\Libcore\Toets;

class ToetsSeeder extends Seeder
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
        DB::table('toets')->truncate();

        $toetsenlijsten=Toetsenlijst::all();
        $aantalToetsen=2;
        $toetsen = factory(Toets::class, $aantalToetsen*count($toetsenlijsten))->create();
        for ($i = 0; $i < count($toetsen);++$i) {
            $toetsen[$i]['toetsenlijst_id'] = $toetsenlijsten[$i/$aantalToetsen]["id"];
            $toetsen[$i]->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
