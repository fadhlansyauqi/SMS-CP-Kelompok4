<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    protected $table = 'tbl_days';

    protected $fillable = ['hari',];
}
