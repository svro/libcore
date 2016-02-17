<?php

use Eduweb2\Libcore\Klas;
use Eduweb2\Libcore\Leerling;
use Eduweb2\Libcore\Lesopdracht;
/*
class TestPerformantie extends PHPUnit_Framework_TestCase
{
    public function testSum() {
        $a=1;
        $b=2;
        $result=$a+$b;
        $this->assertEquals(3,$result);
    }

    public function testTotaal() {
        // bereken het totaal van 1 klas
        $klas = Klas::where('code','=','5WeWb');
        //$this->assertEquals(1,count($klas));


        //var_dump($klas);
    }
}*/

class TestPerformantie extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function testSum() {
        $a=1;
        $b=2;
        $result=$a+$b;
        $this->assertEquals(3,$result);
    }

    public function testTotaal() {
        /*
        foreach (Klas::where('code','5WeWb')->get() as $klas) {
            //var_dump($klas->leerlingen()->get()[10]->klasnummer);
            var_dump($klas->lesopdrachten()->get()[1]->toetsenlijsten()->get()[0]->toetsen()->get()[0]->cijfers()->get()[0]);
        }
        */
        $klassen = Klas::where('code','=', '5WeWb')->with('lesopdrachten','lesopdrachten.toetsenlijsten')->get();

        foreach ($klassen as $klas) {
            echo $klas->code . " " . "DW gemiddelde per vak" . " ". "\n";
            foreach ($klas->lesopdrachten()->get() as $lesopdracht) {
                $vakcode = $lesopdracht->vak()->get()[0]->code;
                $vakuren = $lesopdracht->vak()->get()[0]->uren;
                echo $vakcode . " ";
                $toetsenmax = 0;
                $toetsencijfer = 0;
                foreach ($lesopdracht->toetsenlijsten()->get()[0]->toetsen()->get() as $toets) {
                    foreach ($toets->cijfers()->get() as $cijfer) {
                        $toetsencijfer += $cijfer->waarde;
                        $toetsenmax += $toets->max;
                    }
                }
                echo $toetsencijfer / $toetsenmax . "\n";
                //var_dump($klas->lesopdrachten()->get()[1]->toetsenlijsten()->get()[0]->toetsen()->get()[0]->cijfers()->get()[0]);
            }
        }



        //$klas->load('leerlingen');
        //var_dump($klas);
        //var_dump($klas->lesopdrachten());
        /*foreach ($klas->lesopdrachten() as $lesopdracht) {
            echo "bla";
            echo $lesopdracht->vak()->first()->code;
            foreach ($lesopdracht->toetsenlijst() as $toetsenlijst){
                foreach ($toetsenlijst->toetsen() as $toets) {
                    foreach ($toets->cijfer() as $cijfer) {

                    }
                }
            }
        }*/
        //$this->assertEquals(2,count($klas));


        //var_dump($klas);
    }
}
