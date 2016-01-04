<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Leerling;
use Eduweb2\Libcore\Cijfer;
use Eduweb2\Libcore\Toets;
use Eduweb2\Libcore\Toetsenlijst;
use Eduweb2\Libcore\Lesopdracht;

class CijferSeeder extends Seeder
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
        DB::table('cijfer')->truncate();

        $toetsen=Toets::all();
        //$cijfers = factory(Cijfer::class, count($toetsen)*count($leerlingen))->create();
        for ($i = 0; $i < count($toetsen);++$i) {
            //dd($toetsen[$i]->toetsenlijst()->first()->lesopdracht()->first()->klas()->first()->leerlingen()->first());
            $leerlingen = $toetsen[$i]->toetsenlijst()->first()->lesopdracht()->first()->klas()->first()->leerlingen()->get();
            for ($j=0;$j<count($leerlingen);++$j) {
                $cijfer = factory(Cijfer::class, 1)->create();
                $cijfer["waarde"]=rand(0,10);
                $cijfer["toets_id"]=$toetsen[$i]["id"];
                $cijfer["leerling_id"]=$leerlingen[$j]["id"];
                $cijfer->save();
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
