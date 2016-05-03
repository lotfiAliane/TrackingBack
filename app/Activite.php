<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model {

	//

	protected $table = 'activite';
    

		 protected $fillable = [
        'activiteID',
        'type',
        'dateEnregistrement',
        'dateFin',
        'statut',
        'employeID',
        'commandeID',
        'localiteID'];

  public static $rules = array(
    'Agence' => 'required');

    public static $rules_date = array(
    'dateFin' => 'required');


    public function getKeyName(){
    	return 'activiteID';
    }

    public $timestamps = false;
}
