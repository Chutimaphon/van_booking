<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver_tbl extends Model
{
    protected $fillable = [
        'id_driver', 'fname', 'lname','adderss','tel'
    ];
    protected $primaryKey='id_driver';
}
