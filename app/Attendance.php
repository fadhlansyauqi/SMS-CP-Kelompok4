<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    
    protected $fillable = [
        'nis',
        'nama',
        'tanggal_masuk',
        'jam_masuk',
        'keterangan',
    ];
}

