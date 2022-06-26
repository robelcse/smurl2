<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shortnar extends Model
{
    protected $table = 'shortnars';

    public function logs()
    {
        return $this->hasMany('App\Models\Clicklog','shortnar_id','id');
    } 
    
}
