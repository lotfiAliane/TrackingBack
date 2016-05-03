<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employe_secteur extends Model
{
    //
	public $timestamps = false;
    protected $table='employe_secteur';
      protected  $primarykey = 'employeSecteurID';
    
    protected $fillable=['employeSecteurID','employeID','secteurID'];

   
   
    public function getKeyName()
      {
   	    return "employeSecteurID";
	  }
    
}
