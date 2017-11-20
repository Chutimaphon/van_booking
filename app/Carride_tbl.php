<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carride_tbl extends Model
{
    protected $fillable = [
        'carrid_id', 'source', 'endways','time_out','id_van'
    ];
    protected $primaryKey='carrid_id';
    
}
