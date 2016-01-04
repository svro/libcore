<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Toetsenlijsttype;

class ToetsenlijsttypeSeeder extends Seeder
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
        DB::table('toetsenlijsttype')->truncate();
        $arr = array(
            array('code' => 'DW','naam' => 'Dagelijks Werk'),
            array('code' => 'EX','naam' => 'Examen')
        );
        $toetsenlijsttypes = factory(Toetsenlijsttype::class, count($arr))->create();
        for ($i = 0; $i < count($toetsenlijsttypes);++$i) {
            $toetsenlijsttypes[$i]["code"]=$arr[$i]["code"];
            $toetsenlijsttypes[$i]["naam"]=$arr[$i]["naam"];
            $toetsenlijsttypes[$i]->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
