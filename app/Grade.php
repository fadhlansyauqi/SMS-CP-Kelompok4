<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'tbl_grades';

    protected $fillable = [
        'id_nilai',
        'id_mapel',
        'id_siswa',
        'jenis_nilai',
        'nilai',
    ];
    public function course()
    {
        return $this->belongsTo('App\Course', 'id_mapel');
    }

    public function student()
    {
        return $this->belongsTo('App\Student', 'id_siswa');
    }
}
