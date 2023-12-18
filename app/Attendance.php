<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $table = 'tbl_attendances';

    protected $fillable = [
        'id',
        'date',
        'id_student',
        'id_course',
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
}

