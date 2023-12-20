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
            $table->date('date');
            $table->bigInteger('id_student')->unsigned();
            $table->bigInteger('id_course')->unsigned();
            $table->bigInteger('id_kelas')->unsigned();
            $table->string('status');
            $table->string('desc', 255);
            $table->timestamps();

             // Add foreign key constraint
             $table
             ->foreign('id_student')
             ->references('id')
             ->on('tbl_students');
             $table
             ->foreign('id_course')
             ->references('id')
             ->on('tbl_courses');
             $table
                ->foreign('id_kelas')
                ->references('id')
                ->on('tbl_classes');
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
