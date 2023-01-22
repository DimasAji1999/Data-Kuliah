<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_matkul', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa')->unsigned();
            $table->string('matkul',100);
            $table->string('sks');
            $table->timestamps();

            $table->foreign('siswa')->references('id')->on('m_siswa')->onDelete('restrict');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_matkul', function (Blueprint $table) {
            //
        });
    }
};
