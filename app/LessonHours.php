<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonHours extends Model
{
    protected $table = 'tbl_lesson_hours';

    protected $fillable = ['jam','waktu',];

    public function classSchedule()
    {
        return $this->hasMany(ClassSchedule::class, 'id_lesson_hours', 'id');
    }
}
