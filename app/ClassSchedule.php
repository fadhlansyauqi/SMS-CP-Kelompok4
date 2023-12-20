<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $table = 'tbl_class_schedules'; 

    protected $fillable = [
        'id_lesson_hours',
        'id_course',
        'id_class',
        'hari',
    ];

    public function lessonHour()
    {
        return $this->belongsTo(LessonHours::class, 'id_lesson_hours');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
    }

    public function class()
    {
        return $this->belongsTo(StudentClass::class, 'id_class');
    }
}
