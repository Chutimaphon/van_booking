<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psource extends Model
{
	protected $table = 'psources';
    protected $fillable = ['id','source','psource'];
}