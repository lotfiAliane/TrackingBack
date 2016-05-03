<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preuve extends Model
{
    //

    public $timestamps = false;
    public $table='preuve';
    protected  $primarykey = 'preuveID';
    public function getKeyName(){
   
   	 return "preuveID";
	}
}
