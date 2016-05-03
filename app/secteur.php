<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class secteur extends Model
{
    //
    public $timestamps = false;
    public $table='secteur';
    protected  $primarykey = 'secteurID';
    protected $fillable = [
        'secteurID',
        'lebelle',
        'WilayaID'

    ];

    
     public static $rules = array(
    'lebelle' => 'required|min:4',
    'Wilaya' => 'required');

      public function getKeyName()
      {
        return "secteurID";
      }
       public function employe()
      {
        return $this->belongsToMany('App\employe','employeSecteurID','employeID','secteurID');
      }
}
