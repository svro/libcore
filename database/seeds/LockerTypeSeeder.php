<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\LockerType;

class LockerTypeSeeder extends Seeder
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
        DB::table('locker_type')->truncate();

        $lockertypes = factory(LockerType::class, 3)->create();
        $lockertypes[0]["naam"]="gewoon1stegraad";
        $lockertypes[1]["naam"]="gewoon2degraad";
        $lockertypes[2]["naam"]="laptop";

        foreach ($lockertypes as $lockertype) {
            $lockertype->save();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
