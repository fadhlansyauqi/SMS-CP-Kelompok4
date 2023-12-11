<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'tbl_courses';

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'id_teacher',
    ];

    public function teacher() {
        return $this->belongsTo('App\Teacher', 'id_teacher');
    }
}
