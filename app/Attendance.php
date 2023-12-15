<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'tbl_attendances';

    protected $fillable = [
        'id_absen',
        'id_student',
        // 'id_jadwal',
        'materi',
        'pertemuan',
        'tgl',
        'ket',
    ];
    public function student()
    {
        return $this->belongsTo('App\Student', 'id_student');
    }
}
