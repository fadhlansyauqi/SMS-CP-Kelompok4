<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('id_kelas')->unsigned();
            $table->integer('nis');
            $table->string('nama');
            $table->string('tempat_lahir', 255);
            $table->date('tanggal_lahir');
            $table->string('jk', 20);
            $table->string('nama_ortu', 255);
            $table->text('alamat');
            $table->string('status', 50);
            $table->timestamps();

            // Add foreign key constraint
            $table
                ->foreign('id_kelas')
                ->references('id')
                ->on('tbl_classes');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('tbl_users');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_students');
    }
}
