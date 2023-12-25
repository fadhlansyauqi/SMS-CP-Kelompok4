<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'tbl_grades';

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
    public function sub_grade()
    {
        return $this->belongsTo(SubGrade::class);
    }
}
