<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $table = 'tbl_classes';

    protected $fillable = [
        'id',
        'nama_kelas',
    ];
}
