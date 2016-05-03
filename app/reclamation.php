<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reclamation extends Model
{
    //
    public $timestamps = false;
    public $table='reclamation';
    protected  $primarykey = 'ReclamationID';
    protected $fillable=['codeBordereau','NomClient','MotifDappel','Commentaire','Statut','date'];

      public function getKeyName()
      {
        return "ReclamationID";
      }
      public static $rules = array(
    );
      
}
