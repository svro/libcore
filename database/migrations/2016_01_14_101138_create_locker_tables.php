<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLockerTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // // lockers
        Schema::create('locker_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string("naam");
            $table->string("jaren");
            $table->timestamps();
        });

        Schema::create('locker', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->integer("locker_type_id")->unsigned();
            $table->integer("leerling_id")->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('locker', function ($table) {
            $table->foreign('locker_type_id')
                ->references('id')->on('locker_type')
                ->onDelete('cascade');
            $table->foreign('leerling_id')
                ->references('id')->on('leerling')
                ->onDelete('cascade');
        });

        Schema::create('locker_sleutel_verloren', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("locker_id")->unsigned();
            $table->integer("leerling_id")->unsigned();
            $table->date("datum");
            $table->timestamps();
        });

        Schema::table('locker_sleutel_verloren', function ($table) {
            $table->foreign('locker_id')
                ->references('id')->on('locker')
                ->onDelete('cascade');

            $table->foreign('leerling_id')
                ->references('id')->on('leerling')
                ->onDelete('cascade');
        });
        Schema::create('locker_gewenst', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("leerling_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('locker_gewenst', function ($table) {
            $table->foreign('leerling_id')
                ->references('id')->on('leerling')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // lockers
        /*
        Schema::table('locker', function ($table) {
            $table->dropForeign('locker_locker_type_id_foreign');
            $table->dropForeign('locker_leerling_id_foreign');
        });

        Schema::table('locker_sleutel_verloren', function ($table) {
            $table->dropForeign('locker_sleutel_verloren_locker_id_foreign');
            $table->dropForeign('locker_sleutel_verloren_leerling_id_foreign');
        });
        Schema::table('locker_gewenst', function ($table) {
            $table->dropForeign('locker_gewenst_leerling_id_foreign');
        });
        */
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('locker');
        Schema::drop('locker_type');
        Schema::drop('locker_sleutel_verloren');
        Schema::drop('locker_gewenst');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
