<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    //
	public $timestamps = false;
    protected $table='emlpoye';
      protected  $primarykey = 'employeID';
    
    protected $fillable=['civilite','nom','prenom','poste','email','tel','telfix','telfax','localiteID','espacePriveID'];

    public static $rules = array(
    'nom' => 'required|min:4|max:20',
    'prenom' => 'required|min:4',
    'email' => 'required|email');
    
   
    public function getKeyName()
      {
   	    return "employeID";
	  }
   
    public function espace_prive()
      {
        return $this->belongsTo('App\espace_prive');
      }
   
      public function secteur()
      {
        return $this->belongsToMany('App\secteur','employe_secteur','employeID','secteurID');
      }
      public function localite()
      {
        return $this->hasOne('App\localite','employeID');
      }
      public function localisation()
    {
        return $this->hasOne('App\localisation','employeID','employeID');
    }
   
}
