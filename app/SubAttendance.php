<?php

namespace App;

use App\Student;
use App\Attendance;
use Illuminate\Database\Eloquent\Model;

class SubAttendance extends Model
{
    protected $table = 'tbl_sub_attendances';

    protected $fillable = [
        'id',
        'id_attendance',
        'id_student',
        'status',
        'desc',
    ];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class, 'id_attendance');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }
}
