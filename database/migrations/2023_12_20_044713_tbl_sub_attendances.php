<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblSubAttendances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sub_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_attendance')->unsigned();
            $table->bigInteger('id_student')->unsigned();
            $table->string('status')->nullable();
            $table->string('desc')->nullable();
            $table->timestamps();

            $table->foreign('id_attendance')
                ->references('id')
                ->on('tbl_attendances')
                ->onDelete('cascade');

            $table->foreign('id_student')
                ->references('id')
                ->on('tbl_students')
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
        Schema::dropIfExists('tbl_sub_attendances');
    }
}