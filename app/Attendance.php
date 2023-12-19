<?php

namespace App;

use App\Course;
use App\StudentClass;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $table = 'tbl_attendances';

    protected $fillable = [
        'id',
        'date',
        'id_student',
        'id_course',
        'id_kelas',
        'status',
        'desc',
    ];

    public function student()
    {
        return $this->belongsTo(Attendance::class, 'id_student');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
    }

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'id_kelas');
    }
}

