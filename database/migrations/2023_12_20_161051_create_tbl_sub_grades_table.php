<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSubGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sub_grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_grade')->unsigned();
            $table->bigInteger('id_student')->unsigned();
            $table->string('jenis_nilai')->nullable();
            $table->integer('nilai')->nullable();
            $table->string('desc')->nullable();
            $table->timestamps();


            $table->foreign('id_grade')
                ->references('id')
                ->on('tbl_grades')
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
        Schema::dropIfExists('tbl_sub_grades');
    }
}
