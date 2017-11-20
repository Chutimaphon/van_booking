<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psource extends Model
{
	protected $table = 'pendways';
    protected $fillable = ['id','endway','pendway'];
}