<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Eduweb2\Libcore\User;
use Eduweb2\Libcore\Richting;
use Eduweb2\Libcore\Klas;
use Eduweb2\Libcore\Leerling;
use Eduweb2\Libcore\Leerkracht;
use Eduweb2\Libcore\Vak;
use Eduweb2\Libcore\Lesopdracht;
use Eduweb2\Libcore\ToetsenlijstType;
use Eduweb2\Libcore\Toetsenlijst;
use Eduweb2\Libcore\Toets;
use Eduweb2\Libcore\Cijfer;
use Eduweb2\Libcore\Periode;
use Eduweb2\Libcore\LockerType;
use Eduweb2\Libcore\Locker;
use Eduweb2\Libcore\LockerSleutelVerloren;
use Eduweb2\Libcore\LockerGewenst;


$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'voornaam' => $faker->firstName,
        'achternaam' => $faker->lastName
    ];
});

$factory->define(Richting::class, function (Faker\Generator $faker) {
    return [
        'code' => "6246",
        'naam' => "1L"
    ];
});

$factory->define(Klas::class, function (Faker\Generator $faker) {
    return [
        'code' => "1Ma",
        'naam' => "1Ma",
        'richting_id' => 1,
    ];
});

$factory->define(Leerling::class, function (Faker\Generator $faker) {
    return [
        'klasnummer' => "1Ma",
        'user_id' => 1,
        'klas_id' => 1,
    ];
});

$factory->define(Leerkracht::class, function (Faker\Generator $faker) {
    return [
        'code' => "1Ma",
        'user_id' => 1
    ];
});

$factory->define(Vak::class, function (Faker\Generator $faker) {
    return [
        'code' => "Wi",
        'naam' => "Wiskunde"
    ];
});

$factory->define(Lesopdracht::class, function (Faker\Generator $faker) {
    return [
        'uren' => "1",
        'vak_id' => "1",
        'klas_id' => "1"
    ];
});

$factory->define(Toetsenlijsttype::class, function (Faker\Generator $faker) {
    return [
        'code' => "DW",
        'naam' => "EX"
    ];
});

$factory->define(Toetsenlijst::class, function (Faker\Generator $faker) {
    return [
        'toetsenlijsttype_id' => "1",
        'lesopdracht_id' => "1"
    ];
});

$factory->define(Toets::class, function (Faker\Generator $faker) {
    return [
        'naam' => "goniometrie",
        'max' => 10,
        'toetsenlijst_id' => "1"
    ];
});

$factory->define(Cijfer::class, function (Faker\Generator $faker) {
    return [
        'waarde' => 1,
        'toets_id' => 1,
        'leerling_id' => 1
    ];
});

$factory->define(Periode::class, function (Faker\Generator $faker) {
    return [
        'code' => 'm1',
        'gewicht' => 100
    ];
});

$factory->define(\Eduweb2\Libcore\LockerType::class, function (Faker\Generator $faker) {
    return [
        'naam' => 'Gewone locker',
        'jaren' => '1,2,3,4,5,6'
    ];
});

$factory->define(\Eduweb2\Libcore\Locker::class, function (Faker\Generator $faker) {
    return [
        'code' => 'A001',
        'locker_type_id' => '1',
        'leerling_id' => NULL
    ];
});


$factory->define(\Eduweb2\Libcore\LockerGewenst::class, function (Faker\Generator $faker) {
    return [
        'leerling_id' => '1'
    ];
});

$factory->define(\Eduweb2\Libcore\LockerSleutelVerloren::class, function (Faker\Generator $faker) {
    return [
        'locker_id' => '1',
        'leerling_id' => '1',
        'datum' => $faker->dateTimeThisMonth()->format('Y-m-d')
    ];
});

