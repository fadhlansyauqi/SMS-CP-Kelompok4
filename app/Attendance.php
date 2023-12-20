<?php

namespace App;

use App\Course;
use App\Attendance;
use App\StudentClass;
use App\SubAttendance;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $table = 'tbl_attendances';

    protected $fillable = [
        'id',
        'date',
        'id_course',
        'id_kelas',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
    }

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'id_kelas');
    }
    public function sub_attendance()
    {
        return $this->hasOne(SubAttendance::class);
    }
}

