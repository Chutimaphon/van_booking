<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Van_tbl extends Model
{
    protected $fillable = [
        'id_van','brand','seat','cost','parking_bok'
    ];

}
