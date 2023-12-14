<?php

namespace App;

use App\Student;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $table = 'tbl_classes';

    protected $fillable = ['id', 'nama_kelas'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
