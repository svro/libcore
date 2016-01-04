<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UserSeeder::class);
        $this->call(RichtingSeeder::class);
        $this->call(KlasSeeder::class);
        $this->call(LeerlingSeeder::class);
        $this->call(LeerkrachtSeeder::class);
        $this->call(VakSeeder::class);
        $this->call(LesopdrachtSeeder::class);
        $this->call(PeriodeSeeder::class);
        $this->call(ToetsenlijsttypeSeeder::class);
        $this->call(ToetsenlijstSeeder::class);
        $this->call(ToetsSeeder::class);
        $this->call(CijferSeeder::class);
        Model::reguard();
    }
}
