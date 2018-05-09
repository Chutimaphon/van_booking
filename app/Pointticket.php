<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pointticket extends Model
{
    protected $fillable = [
        'id', 'topic', 'name','address','route','tel','map'
            ];
    protected $primaryKey='id';
    
}
