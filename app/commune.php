<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commune extends Model
{
    //
    public $timestamps = false;
    public $table='ville';
    protected  $primarykey = 'villeID';

       public function getKeyName(){
    return "villeID";
}
public function wilaya(){

	return $this->belongsTo('App\wilaya');
}

}
