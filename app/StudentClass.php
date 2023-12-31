<?php

namespace App;

use App\User;
use App\Student;
use App\Attendance;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $table = 'tbl_classes';

    protected $fillable = ['id', 'nama_kelas'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

   public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class, 'id_class');
    }
}
