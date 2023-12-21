<?php

namespace App;

use App\Student;
use App\Grade;
use Illuminate\Database\Eloquent\Model;

class SubGrade extends Model
{
    protected $table = 'tbl_sub_grades';

    protected $fillable = [
        'id',
        'id_grade',
        'id_student',
        'jenis_nilai',
        'nilai',
        'desc',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'id_grade');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }
}
