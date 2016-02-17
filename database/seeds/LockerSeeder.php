<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Locker;
use Eduweb2\Libcore\LockerType;
use Eduweb2\Libcore\Leerling;

class LockerSeeder extends Seeder
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
        DB::table('locker')->truncate();

        $aantal= Leerling::get()->count();
        //$aantal= 2;
        $lockers = factory(Locker::class,$aantal)->create();
        $codes = array('A','B','C');
        $batch=floor($aantal/count($codes));
        $batcheinde=$batch;
        for ($j=0;$j<count($codes);++$j) {
            if ($j==(count($codes)-1)) $batcheinde=$aantal-((count($codes)-1)*$batch);
            for ($i = 0; $i < $batcheinde; ++$i) {
                $lockers[$j * $batch + $i]->code = $codes[$j] . sprintf('%03d', ($i + 1));
                $lockers[$j * $batch + $i]->lockertype()->associate(LockerType::find(1));
                $lockers[$j * $batch + $i]->save();
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
