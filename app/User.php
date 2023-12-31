<?php

namespace App;

use App\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbl_users';

    protected $fillable = [
         'name','email', 'password', 'role', 'id_kelas',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role === 'ADMIN';
    }

    public function isTeacher()
    {
        return $this->role === 'TEACHER';
    }

    public function isStudent()
    {
        return $this->role === 'STUDENT';
    }

     public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'id_kelas');
    }

    public function user_student()
    {
        return $this->hasOne(Student::class);
    }
}
