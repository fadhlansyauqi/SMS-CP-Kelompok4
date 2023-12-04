<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'tbl_grades';

    protected $fillable = [
        'id_mapel',
        'id_siswa',
        'jenis_nilai',
        'nilai',
    ];
}
