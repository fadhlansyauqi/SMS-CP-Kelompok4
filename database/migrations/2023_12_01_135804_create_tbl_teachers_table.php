<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nip');
            $table->string('nama', 255);
            $table->string('tempat_lahir', 255);
            $table->date('tanggal_lahir');
            $table->string('jk', 20);
            $table->text('alamat');
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
        Schema::dropIfExists('tbl_teachers');
    }
}
