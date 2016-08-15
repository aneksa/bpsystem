<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTahapanSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahapanSurvey', function (Blueprint $table) {
            $table->increments('id_Tahapan');
            $table->string('id_Survey');
            $table->string('nama_Tahapan');
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
            $table->string('data_Tahapan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tahapanSurvey');
    }
}

