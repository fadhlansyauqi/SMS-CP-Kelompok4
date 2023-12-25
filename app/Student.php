<?php

namespace App;

use App\Attendance;
use App\SubAttendance;
use App\StudentClass;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'tbl_students';

    protected $fillable = ['id', 'id_kelas', 'user_id', 'nis', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jk', 'nama_ortu', 'alamat', 'status'];

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'id_kelas');
    }
    
    public function attendance()
    {
        return $this->hasMany(SubAttendance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
