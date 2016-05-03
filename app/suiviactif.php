<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suiviactif extends Model
{
    //
    public $timestamps = false;
    public $table='suiviactif';
    protected  $primarykey = 'suiviActifID';
    protected $fillable=['suiviActifID','type','statut','adresse','intitule','date','codeBordereau'];

      public function getKeyName()
      {
        return "suiviActifID";
      }
       
}
