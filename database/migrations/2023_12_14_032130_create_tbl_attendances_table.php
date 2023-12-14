<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_absen');
            $table->integer('id_student');
            // $table->integer('id_jadwal');
            $table->string('materi', 255);
            $table->string('pertemuan', 20);
            $table->date('tgl');
            $table->string('ket', 255);
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
        Schema::dropIfExists('tbl_attendances');
    }
}
