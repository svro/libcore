<?php

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
            $table->integer("uren");
            $table->integer("vak_id")->unsigned();
            $table->integer("klas_id")->unsigned();
            $table->timestamps();
        });
        Schema::table('lesopdracht', function ($table) {
            $table->foreign('vak_id')
                ->references('id')->on('vak')
                ->onDelete('cascade');
        });
        Schema::table('lesopdracht', function ($table) {
            $table->foreign('klas_id')
                ->references('id')->on('klas')
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
        });

        // punten

        Schema::create('toetsenlijsttype', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->string("naam");
            $table->timestamps();
        });

        Schema::create('toetsenlijst', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("toetsenlijsttype_id")->unsigned();
            $table->integer("lesopdracht_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('toetsenlijst', function ($table) {
            $table->foreign('toetsenlijsttype_id')
                ->references('id')->on('toetsenlijsttype')
                ->onDelete('cascade');
        });

        Schema::table('toetsenlijst', function ($table) {
            $table->foreign('lesopdracht_id')
                ->references('id')->on('lesopdracht')
                ->onDelete('cascade');
        });

        Schema::create('toets', function (Blueprint $table) {
            $table->increments('id');
            $table->string("naam");
            $table->float("max");
            $table->integer("toetsenlijst_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('toets', function ($table) {
            $table->foreign('toetsenlijst_id')
                ->references('id')->on('toetsenlijst')
                ->onDelete('cascade');
        });

        Schema::create('cijfer', function (Blueprint $table) {
            $table->increments('id');
            $table->float("waarde");
            $table->integer("toets_id")->unsigned();
            $table->integer("leerling_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('cijfer', function ($table) {
            $table->foreign('toets_id')
                ->references('id')->on('toets')
                ->onDelete('cascade');

            $table->foreign('leerling_id')
                ->references('id')->on('leerling')
                ->onDelete('cascade');
        });

        Schema::create('periode', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->integer("gewicht")->unsigned();
            $table->timestamps();
        });

        Schema::create('periode_toetsenlijst', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("periode_id")->unsigned();
            $table->integer("toetsenlijst_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('periode_toetsenlijst', function ($table) {
            $table->foreign('periode_id')
                ->references('id')->on('periode')
                ->onDelete('cascade');

            $table->foreign('toetsenlijst_id')
                ->references('id')->on('toetsenlijst')
                ->onDelete('cascade');
        });

        Schema::create('trimverhouding', function (Blueprint $table) {
            $table->increments('id');
            $table->float("gewicht");
            $table->integer("richting_id")->unsigned();
            $table->integer("toetsenlijsttype_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('trimverhouding', function ($table) {
            $table->foreign('richting_id')
                ->references('id')->on('richting')
                ->onDelete('cascade');

            $table->foreign('toetsenlijsttype_id')
                ->references('id')->on('toetsenlijsttype')
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
            $table->dropForeign('lesopdracht_klas_id_foreign');
        });
        Schema::table('leerkracht_lesopdracht', function ($table) {
            $table->dropForeign('leerkracht_lesopdracht_leerkracht_id_foreign');
            $table->dropForeign('leerkracht_lesopdracht_lesopdracht_id_foreign');
        });




        Schema::table('toetsenlijst', function ($table) {
            $table->dropForeign('toetsenlijst_toetsenlijsttype_id_foreign');
            $table->dropForeign('toetsenlijst_lesopdracht_id_foreign');
        });
        Schema::table('toets', function ($table) {
            $table->dropForeign('toets_toetsenlijst_id_foreign');
        });
        Schema::table('cijfer', function ($table) {
            $table->dropForeign('cijfer_toets_id_foreign');
            $table->dropForeign('cijfer_leerling_id_foreign');
        });
        Schema::table('trimverhouding', function ($table) {
            $table->dropForeign('trimverhouding_richting_id_foreign');
            $table->dropForeign('trimverhouding_toetsenlijsttype_id_foreign');
        });
        Schema::table('periode_toetsenlijst', function ($table) {
            $table->dropForeign('periode_toetsenlijst_periode_id_foreign');
            $table->dropForeign('periode_toetsenlijst_toetsenlijst_id_foreign');
        });

        Schema::drop('richting');
        Schema::drop('klas');
        Schema::drop('user');
        Schema::drop('leerling');
        Schema::drop('vak');
        Schema::drop('lesopdracht');
        Schema::drop('leerkracht');
        Schema::drop('leerkracht_lesopdracht');

        Schema::drop('cijfer');
        Schema::drop('toets');
        Schema::drop('toetsenlijst');
        Schema::drop('toetsenlijsttype');
        Schema::drop('periode');
        Schema::drop('trimverhouding');
        Schema::drop('periode_toetsenlijst');
    }
}
