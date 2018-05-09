<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $fillable = [
        'id_point', 'psource', 'pendway','cost'
            ];
    protected $primaryKey='id_point';
    
}
