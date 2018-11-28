<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class article extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\category');
    }

    public function comment(){
        return $this->hasMany('App\comment')->orderBy('id','DESC')->take('9');
    }
    public function getPublishDateAttribute($value){
        $a=new carbon($value);
        $date=$a->format('h:ia d M, Y');              
        return ($date);
    }
    public function getCreatedAtAttribute($value){
        $a=new carbon($value);
        $date=$a->format('d M, Y');              
        return ($date);
    }
    

}
