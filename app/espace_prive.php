<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class espace_prive extends Model
{
    //


 public $table='espace_prive';

     protected $fillable=['espacePriveID','identifiant','motDePasse'];
    public $timestamps = false;
   
    protected  $primarykey = 'espacePriveID';

       public function getKeyName(){
    return "espacePriveID";
}
    public function employe()
      {
      return $this->belongsTo('App\employe');
      }
      public function Client()
    {
        return $this->hasOne('App\Client','espacePriveID','espacePriveID');
    }
}

