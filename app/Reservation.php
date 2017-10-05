<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'id_res', 'id_van', 'carrid_id','date','id','time_out','seat'
    ];
    protected $primaryKey='id_res';
}
