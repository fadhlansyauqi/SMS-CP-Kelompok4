<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $table = 'tbl_class_schedules';

    protected $fillable = [
        'id_course',
        'id_class',
    ];

    public function course() {
        return $this->belongsTo('App\Course', 'id_course');
    }
}
