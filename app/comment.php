<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class comment extends Model
{
    public function article(){
        return $this->belongsTo('App\article');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function getCreatedAtAttribute($value){
        $a=new carbon($value);
        $date=$a->format('d M, Y');              
        return ($date);
    }

}
