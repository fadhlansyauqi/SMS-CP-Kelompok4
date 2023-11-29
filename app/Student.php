<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'id_kelas',
        'nis',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'nama_ortu',
        'alamat',
        'status',
    ];
}
