<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actif extends Model
{
    //
    public $timestamps = false;
    public $table='actif';
    protected  $primarykey = 'actifID';
    protected $fillable=['suiviActifID','statut','type','codeProduit','intituleProduit','infoProduit','expediteurID','destinataireID','commandeID','dateEnvoi','dateActif'];

      public function getKeyName()
      {
        return "actifID";
      }
       
}
