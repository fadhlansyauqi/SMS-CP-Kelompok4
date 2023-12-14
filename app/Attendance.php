<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
<<<<<<< HEAD
    
    protected $fillable = [
        'nis',
        'nama',
        'tanggal_masuk',
        'jam_masuk',
        'keterangan',
    ];
}

=======
    protected $table = 'tbl_attendances';

    protected $fillable = [
        'nis',
        // 'id_jadwal',
        'nama',
        'pertemuan',
        'tgl',
        'ket',
    ];
    public function student()
    {
        return $this->belongsTo('App\student', 'nis');
    }
}
>>>>>>> 41cf50e572b840512ef5212777f256b79d51c5ff
