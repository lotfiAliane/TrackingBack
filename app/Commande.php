<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model {

	//

	protected $table = 'commande';
    
 protected $fillable=['commandeID','type','statut','clientID','dateCommande'];



    public function getKeyName(){
    	return 'commandeID';
    }

    public $timestamps = false;
}
