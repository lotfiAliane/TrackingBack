<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model {

	//

 
 protected $table='ville';

 protected $fillable = 
 [
        'villeID',
        'secteurID',
        'ville',
        'codePostal',
        'wilayaID'
        
    ];


    public function getKeyName(){
    	return 'villeID';
    }


    public $timestamps = false;
}
