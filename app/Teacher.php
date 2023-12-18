<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'tbl_teachers';

    protected $fillable = [
        'nip',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'alamat',
        'foto',
    ];
}
