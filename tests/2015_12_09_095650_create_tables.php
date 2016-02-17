<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string("voornaam");
            $table->string("achternaam");
            $table->timestamps();
        });
        Schema::create('richting', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->string("naam");
            $table->timestamps();
        });
        Schema::create('klas', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->string("naam");
            $table->integer("richting_id")->unsigned();
            $table->timestamps();
        });
        Schema::table('klas', function ($table) {
            $table->foreign('richting_id')
                ->references('id')->on('richting')
                ->onDelete('cascade');
        });
        Schema::create('leerling', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("klasnummer");
            $table->integer("user_id")->unsigned();
            $table->integer("klas_id")->unsigned();
            $table->timestamps();
        });
        Schema::table('leerling', function ($table) {
            $table->foreign('user_id')
                ->references('id')->on('user')
                ->onDelete('cascade');
        });
        Schema::table('leerling', function ($table) {
            $table->foreign('klas_id')
                ->references('id')->on('klas')
                ->onDelete('cascade');
        });
        Schema::create('leerkracht', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->integer("user_id")->unsigned();
            $table->timestamps();
        });
        Schema::table('leerkracht', function ($table) {
            $table->foreign('user_id')
                ->references('id')->on('user')
                ->onDelete('cascade');
        });
        Schema::create('vak', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->string("naam");
            $table->timestamps();
        });
        Schema::create('lesopdracht', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("vak_id")->unsigned();
            $table->timestamps();
        });
        Schema::table('lesopdracht', function ($table) {
            $table->foreign('vak_id')
                ->references('id')->on('vak')
                ->onDelete('cascade');
        });
        Schema::create('leerkracht_lesopdracht', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("leerkracht_id")->unsigned();
            $table->integer("lesopdracht_id")->unsigned();
            $table->timestamps();
        });
        Schema::table('leerkracht_lesopdracht', function ($table) {
            $table->foreign('leerkracht_id')
                ->references('id')->on('leerkracht')
                ->onDelete('cascade');
        });
        Schema::table('leerkracht_lesopdracht', function ($table) {
            $table->foreign('lesopdracht_id')
                ->references('id')->on('lesopdracht')
                ->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {/*
        Schema::table('klas', function ($table) {
            $table->dropForeign('klas_richting_id_foreign');
        });
        Schema::table('leerling', function ($table) {
            $table->dropForeign('leerling_user_id_foreign');
            $table->dropForeign('leerling_klas_id_foreign');
        });
        Schema::table('leerkracht', function ($table) {
            $table->dropForeign('leerkracht_user_id_foreign');
        });
        Schema::table('lesopdracht', function ($table) {
            $table->dropForeign('lesopdracht_vak_id_foreign');
        });
        Schema::table('leerkracht_lesopdracht', function ($table) {
            $table->dropForeign('leerkracht_lesopdracht_leerkracht_id_foreign');
            $table->dropForeign('leerkracht_lesopdracht_lesopdracht_id_foreign');
        });

        Schema::drop('richting');
        Schema::drop('klas');
        Schema::drop('user');
        Schema::drop('leerling');
        Schema::drop('vak');
        Schema::drop('lesopdracht');
        Schema::drop('leerkracht');
        Schema::drop('leerkracht_lesopdracht');*/
    }
}
