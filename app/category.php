<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function articles(){
        return $this->hasMany('App\article');
    }
    
}
