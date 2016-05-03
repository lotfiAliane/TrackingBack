<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Client extends Model {


	//
	public $timestamps = false;

	public $table='client';
	protected  $primarykey = 'clientID';
	public $fillable=['clientID','nom','prenom','email','telMobile','telFixe','telFax','raisonSociale','civilite','numRegistreCommerce','numFiscal',
		'logo','siteWeb','dateEnregistrement','dateDebutContrat','dateFinContrat','statut','espacePriveID'];
	public function getKeyName(){

		return "clientID";
	}
	public function espace_prive()
	{
		return $this->belongsTo('App\espace_prive');
	}

	
	/*protected $fillable = [
		'clientID',
		'nom',
		'prenom',
		'email',
		'telMobile',
		'telFixe',
		'telFax',
		'raisonSociale',
		'civilite',
		'numRegistreCommerce',
		'numFiscale',
		'logo',
		'siteWeb',
		'dateEnregistrement',
		'datedebutContrat',
		'dateFinContrat',
		'statut',
		'espacePriveID',
		'created_at',
		'update_at'




	];*/

}
