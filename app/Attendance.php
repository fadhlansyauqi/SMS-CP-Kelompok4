<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'tbl_attendances';

    protected $fillable = [
        'nis',
        // 'id_jadwal',
        'nama',
        'pertemuan',
        'tgl',
        'ket',
    ];
    public function student()
    {
        return $this->belongsTo('App\student', 'nis');
    }
}
