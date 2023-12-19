<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_nilai');
            $table->integer('id_mapel');
            $table->string('nama_mapel', 100);
            $table->integer('id_siswa');
            $table->string('nama_siswa', 150);
            $table->string('jenis_nilai', 50);
            $table->integer('nilai');
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
        Schema::dropIfExists('tbl_grades');
    }
}
