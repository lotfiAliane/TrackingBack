<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class localisation extends Model
{
    //
    	public $timestamps = false;
    public $table='localisation';
    protected  $primarykey = 'localisationID';
    public $fillable=['latitude','longitude','nom'];
     
    public function getKeyName(){
   
   	 return "localisationID";
	}
	   public function employe()
  {
    return $this->belongsTo('App\employe','employeID');
  }
}
