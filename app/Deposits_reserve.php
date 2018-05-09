<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposits_reserve extends Model
{
    protected $fillable = [
        'id', 'name', 'detail','type','price','id_point','carrid_id','time_out','date','status'
    ];
    protected $primaryKey='id';
}


