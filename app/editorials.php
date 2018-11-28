<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class editorials extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }
    public function getPublishDateAttribute($value){
        $a=new carbon($value);
        $date=$a->format('d M Y');              
        return ($date);
    }
}
