<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_tbl extends Model
{
    protected $fillable = [
        'id_news', 'name', 'details',
    ];
    protected $primaryKey='id_news';
}