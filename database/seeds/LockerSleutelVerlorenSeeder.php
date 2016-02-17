<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Locker;
use Eduweb2\Libcore\LockerSleutelVerloren;
use Eduweb2\Libcore\Leerling;

class LockerSleutelVerlorenSeeder extends Seeder
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
        DB::table('locker_sleutel_verloren')->truncate();

        $aantal= Locker::get()->count();
        //$aantal=2;
        $sleutelsverloren = factory(LockerSleutelVerloren::class,$aantal)->create();
        $lockers=Locker::all();
        for ($i=0;$i< $aantal;++$i) {
            //$leerling=$lockers[$i]->leerling();
            $sleutelsverloren[$i]->locker()->associate($lockers[$i]);
            $sleutelsverloren[$i]->leerling()->associate(Leerling::find($lockers[$i]->leerling_id));
            //$sleutelsverloren[$i]->leerling()->associate($lockers[$i]->leerling());
            //if ($i==0) var_dump($lockers[$i]->leerling()->get());
            $sleutelsverloren[$i]->save();
        }


        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
