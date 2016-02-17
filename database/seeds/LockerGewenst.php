<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\LockerGewenst;
use Eduweb2\Libcore\Leerling;

class LockerGewenstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('locker_gewenst')->truncate();

        $aantal= Leerling::get()->count();
        //$aantal= 2;
        $lockersGewenst = factory(LockerGewenst::class,$aantal)->create();
        for ($i=0;$i< $aantal;++$i) {
            $lockersGewenst[$i]->leerling()->associate(Leerling::find($i+1));
            $lockersGewenst[$i]->save();
        }


        Model::reguard();
    }
}
