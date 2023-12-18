<?php

namespace App;

use App\Attendance;
use App\StudentClass;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'tbl_students';

    protected $fillable = ['id', 'id_kelas', 'nis', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jk', 'nama_ortu', 'alamat', 'status'];

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'id_kelas');
    }
    
    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }
}
