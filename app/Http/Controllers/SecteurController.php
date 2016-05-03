<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Input;
use App\Secteur;
use App\Localite;
use App\Ville;
use App\Wilaya;
use App\Employe_Secteur;
use App\Employe;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;



class SecteurController extends Controller {


	//fonction de la page d'accuiel " GESTION DES SECTEURS D'ATIVITES"
	public function index()
	{
		//Récupiration des secteurs de la base de données
		$secteurs = Secteur::paginate(8);

		//Récupiration des Wilayas de la base de données
		$wilayas = Wilaya::all();

		//Récupiration des Communes de la base de données
		$villes = Ville::all();

		//Récupiration des Employés
		$employes = Employe::all();

		//Récupiration des Secteur de chaque Agent
		$employe_secteur = Employe_Secteur::all();

		return view('secteur.index', compact('secteurs','wilayas', 'villes', 'employes','employe_secteur'));
	}


public function search(){
      $par=Input::get('par');
      $match = Input::get('find');
    
		//Récupiration des Wilayas de la base de données
		$wilayas = Wilaya::all();

		//Récupiration des Communes de la base de données
		$villes = Ville::all();

		//Récupiration des Employés
		$employes = Employe::all();


		//Récupiration des Secteur de chaque Agent
		$employe_secteur = Employe_Secteur::all();


    $secteurs = Secteur::where($par, 'LIKE', '%' . $match . '%')->paginate(5);
    return view('secteur.index', compact('secteurs','wilayas', 'villes', 'employes','employe_secteur'));
    }




	// fonction pour retourner le formulaire d'ajout d'un secteur d'activité
	public function getAjouter()
	{
		//Récupiration des Wilayas de la base de données
		$wilayas = Wilaya::all();

		//Récupiration des Communes de la base de données
		$villes = Ville::orderBy('ville', 'ASC')->get();

		return view('secteur.ajouter_secteur',compact('wilayas', 'villes'));
	}



	//fonction pour ajouter un secteur d'activité
	public function postAjouter(Request $request)
	{

		// Récupiration des Inputs 
		$lebelle=$request->input('lebelle');
		$wilayaID=$request->input('Wilaya');
		$id=Secteur::where('lebelle' , 'like' , $lebelle)->where('wilayaID' , 'like' , $wilayaID);



		$input = Input::all();
		$validation = Validator::make($input, Secteur::$rules);


		 if ($validation->passes())
		 {
		// Création de nouveau Secteur d'activité 
		Secteur::create(
			array(
				'lebelle' => $lebelle, 
				'WilayaID' => $wilayaID
				));



		// Récupiration de l'ID de nouvveau secteur créé
		$secteurID=Secteur::where('lebelle', 'like', $lebelle)->where('wilayaID', 'like', $wilayaID)->get();


		// Mise à jour de la table " Ville (commune) " 
		for($i=1 ; $i <= Ville::count() ; $i++)
		{
			if($request->input('name'.$i)!=null)
			{			
				$ville=Ville::where('villeID', '=', $i);			
				$ville->update(array('secteurID' => $secteurID->lists('secteurID')[0]));
			}			
		}
		return redirect('secteur');
		}
		return redirect('secteur/ajouter')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');

	}



	//Fonctuion pour la supprission des secteurs
	public function postSupprimer($id)
	{
		//Mise à jour de la table Employe_Secteur
		$test=Employe_Secteur::where('secteurID', '=', $id)->delete();

		// Supprission de Secteur d'activité 
 		Secteur::where('secteurID', '=', $id)->delete();

 		// Mise à jour de la table "Ville (commune)"
 		$ville = Ville::where('secteurID', '=', $id);
 		$ville->update(array('secteurID' => 0));
 		return redirect('secteur');

	}



	//Fonction pour retourner le formulaire rempli avec les informations de secteur a modifier
	public function getModifier($secteurID)
	{
		
		$secteurs = Secteur::find($secteurID);
		$villes = Ville::all();
		$wilayas = Wilaya::all();
		return view('secteur.modifier_secteur',compact('secteurs','wilayas' ,'villes', 'secteurID'));
	

	}


	//Fonction pour sauvegarder les informations modifiées de secteur 
	public function postModifier($secteurID, Request $request)
	{
		//Récupiraton des informations introduites dans le formulaire
		$lebelle=$request->input('lebelle');
		$wilayaID=$request->input('Wilaya');


		//Validation des informations
		$input = Input::all();
		$validation = Validator::make($input, Secteur::$rules);

		//dans le cas ou les informations introduites sont correctes
		 if ($validation->passes())
		 {

		 	//mise à jour lebelle et wilaya Secteur
			$secteur = Secteur::find($secteurID);
			$secteur->update(array('lebelle' => $lebelle , 'WilayaID' => $wilayaID));


			$ville = Ville::where('secteurID', '=', $secteurID);
			
 			$ville->update(array('secteurID' => 0));

			
 			//mise à jour de la table ville
			for($i=1 ; $i <= Ville::count() ; $i++)
			{	
				if($request->input('name'.$i)!=null)
				{	
					$ville=Ville::where('villeID', '=', $i);
					$ville->update(array('secteurID' => $secteurID));
				}			
			}

			//retourner la page index secteur
		return redirect('secteur');
		}


		//Dans le cas ou les informations introduites sont incorrectes on retourner la page de modification avec les messages d'erreurs
		return redirect('secteur/modifier/'.$secteurID.'?')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');


	}



	public function getAffectation($id)
	{
		//

		$secteur=Secteur::find($id);
		$localites=Localite::all();
		$employes=Employe::all();
		$employe_secteur = Employe_Secteur::all();

		return view('secteur.affectation_secteur',compact('secteur', 'localites','employes','employe_secteur'));
	}


	public function postAffectation($secteurID, Request $request)
	{

		//supprission de l"ancienne liste  des agents affectés au secteur
		$emp_sec = Employe_Secteur::where('secteurID', '=', $secteurID)->delete();

		$employes = employe::all();


		//Création de la nouvelle liste des agents qui appartient au secteur
		foreach ($employes as $employe) 
		{

			
				if($request->input('add'.$employe->employeID)!=null)
				{	
					Employe_Secteur::create(
						array(
							'employeID' => $employe->employeID, 
							'secteurID' => $secteurID
							)
						);
				}			
			}

		return redirect('secteur');
	}

}