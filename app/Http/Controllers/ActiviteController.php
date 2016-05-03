<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Input;
use DB;
use App\Activite;
use App\Commande;
use App\Client;
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


class ActiviteController extends Controller 
{
	//Fonctuion pour Retourner la liste des activités
	public function index()
	{

		$activites = Activite::all();
		$commandes = Commande::all();
		$clients = Client::all();
		$employes = Employe::all();
		$localites= Localite::all();

		return view('activite.index',compact('activites','commandes','clients','employes','localites'));
	}

	public function traite(){
	
		$activites=Activite::where('statut','=','Termine')->get();
		$commandes = Commande::all();
		$clients = Client::all();
		$employes = Employe::all();
		$localites= Localite::all();

		return view('activite.index',compact('activites','commandes','clients','employes','localites'));

	}

public function nontraite(){
		$activites=Activite::where('statut','<>','Termine')->get();
		$commandes = Commande::all();
		$clients = Client::all();
		$employes = Employe::all();
		$localites= Localite::all();

		return view('activite.index',compact('activites','commandes','clients','employes','localites'));
}

	public function nonafecte(){

		$activites=Activite::where('employeID','=','0')->get();
		$commandes = Commande::all();
		$clients = Client::all();
		$employes = Employe::all();
		$localites= Localite::all();

		return view('activite.index',compact('activites','commandes','clients','employes','localites'));


	}
	public function jour(){

		$ldate = date('Y-m-d');
    	
      $time = strtotime($ldate.'+1 days');
    $date2 = date('Y-m-d',$time);
    	$activites=Activite::where('dateEnregistrement','>=',$ldate)->where('dateEnregistrement','<=',$date2)->get();
		
$commandes = Commande::all();
		$clients = Client::all();
		$employes = Employe::all();
		$localites= Localite::all();

		return view('activite.index',compact('activites','commandes','clients','employes','localites'));


	}

public function search(){
     // $par=Input::get('datepicker');
      $match = Input::get('datepicker');
      $match=strtotime($match);
      $match=date('Y-m-d',$match);

      $time = strtotime($match.'+1 days');
      $newformat = date('Y-m-d',$time);

		$activites = Activite::where('dateEnregistrement','>=',$match)->where('dateEnregistrement','<=',$newformat)->get();
		

		$commandes = Commande::all();
		$clients = Client::all();
		$employes = Employe::all();
		$localites= Localite::all();

		return view('activite.index',compact('activites','commandes','clients','employes','localites'));

    
    }


	//Fonctuion pour la supprission des secteurs
	public function postSupprimer($id)
	{
		// Supprission de l'activité 
 		Activite::where('activiteID', '=', $id)->delete();

 		return redirect('activite');

	}


	//Fonction pour retourner la page d'affectation
	public function getAffectation($id)
	{
		$localites=Localite::all();

		$employes=Employe::all();

		return view('activite.affectation_activite',compact('id','localites','employes'));
	}


	//Fonction pour valider l'affectation 
	public function postAffectation($id, Request $request)
	{
		$agentID=$request->input('agent');

		$localiteID=$request->input('Agence');

		//Validation des informations
		$input = Input::all();
		$validation = Validator::make($input, Activite::$rules);

		if ($validation->passes())
		{
			$activite=Activite::where('activiteID', '=' ,$id);
			$activite->update(array('employeID' => $agentID, 'statut'=>'active', 'localiteID' =>$localiteID));
			return redirect('activite');
		}
		return redirect('activite/affectation/'.$id.'?')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');

	}


	//Fonction pour retourner le formulaire rempli avec les informations de l'activité a modifier
	public function getModifier($activiteID)
	{
		
		$activite  = Activite::where('activiteID', '=' , $activiteID)->get();

		$localites = Localite::all();

		$employes  = Employe::all();

		$time=substr($activite[0]->dateFin, 11); 

		$date=substr($activite[0]->dateFin,0,10); 

		$new=$date."T".$time;

		$client = DB::table('client')
   			 ->join('commande', 'client.clientID', '=', 'commande.clientID')
   			 ->join('activite', 'activite.commandeID', '=', 'commande.commandeID')
   			 ->where('activite.activiteID', '=', $activiteID)
   			 ->get(['nom', 'prenom']);	

   		$nom=$client[0]->nom;

   		$prenom = $client[0]->prenom;
		
		return view('activite.modifier_activite', compact('activite','localites','employes','nom','prenom','new','activiteID'));

	}


	//Fonction pour sauvegarder les informations modifiées de l'activité
	public function postModifier($activiteID, Request $request)
	{
		
		//Récupiraton des informations introduites dans le formulaire
		$localite=$request->input('localiteID');

		$agent=$request->input('agent');

		$statut=$request->input('statut');

		$dateFin=$request->input('dateFin');

		$time=substr($dateFin, 11); 

		$date=substr($dateFin,0,10); 
	
		$tmp=Activite::where('activiteID','=',$activiteID);

		$tmp->update(array('localiteID' => $localite,'employeID' => $agent, 'statut' => $statut));

		if($statut == 'terminé')
		{
			//Validation des informations
			$input = Input::all();
			$validation = Validator::make($input, Activite::$rules_date);

			if ($validation->passes())
			{
				$tmp->update(array('dateFin' => $dateFin));
				return redirect('activite');
			}
			return redirect('activite/modifier/'.$activiteID.'?')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
		}
		else
		{
			$tmp->update(array('dateFin' => null));
			return redirect('activite');
		}
	}
}