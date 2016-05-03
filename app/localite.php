<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class localite extends Model
{
    //
	public $timestamps = false;
    public $table='localite';
    protected  $primarykey = 'localiteID';
    public $fillable=['libelleLocalite','numrue','libellerue','codepostale','commune','ville','pays'];
     public static $rules = array(
    'libelleLocalite' => 'required|min:4',
    'codepostale' => 'required|numeric',
    'numrue' => 'required|numeric',
    'pays' => 'required|min:2');
    public function getKeyName(){
   
   	 return "localiteID";
	}

public function employe()
{
    return $this->belongsTo('App\employe','employeID');
}
}
