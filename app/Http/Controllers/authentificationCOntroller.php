<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EspaceRequest;
use App\Http\Requests;
use App\espace_prive;
use App\employe;
use Illuminate\Support\Facades\Session;
use Mail;


class authentificationCOntroller extends Controller
{
    //

    public function index(){
        
        if (Session::has('SemployeID')){
         return redirect()->action('dashboardController@index');  
        }

    	return view('espacePrive.authentification');
    }

    public function log(){
        Session::flush();
        return redirect()->action('authentificationCOntroller@index');

}

    public function preoublier(){

    return view('espacePrive.mdpoublier');
    }
    public function postoublier(Request $request){
       
       $espace=espace_prive::where('identifiant','=',$request->identifiant)->first();
       if($espace){
       $employe=employe::where('espacePriveID','=',$espace->espacePriveID)->first();
       $password = md5($employe->email);
       
       if($employe->email==$request->mail){
        $espace->motDePasse=$password;
        $espace->save();
        Mail::send('espacePrive.contenuMail', array('name'=>$employe->nom,'firstname'=>$employe->prenom,'mdp'=>$password), function($message) use ($employe)
        {
            $message->to($employe['email'])->subject('Changement de mot de passe');
       
       });
         return redirect()->action('authentificationCOntroller@index')->with('message','votre mot de passe a été modifiée merci de consulter votre boite mail');

    }else {
        return redirect()->action('authentificationCOntroller@preoublier')->with('message','votre adresse email est invalide');
    }
    }
    else{
        return redirect()->action('authentificationCOntroller@preoublier')->with('message','votre identifiant est invalide');   
    }
}
    public function auth(EspaceRequest $request){

    	$data=$request->all();
    	
    	$espace=espace_prive::where('identifiant','=',$request->user)->where('motDePasse','=',$request->password)->first();
    	
    	if($espace){

    		$employe=employe::where('espacePriveID','=',$espace->espacePriveID)->first();
    		if($employe){
    			$statut=$employe->poste;
    			if($statut=="Administrateur" || $statut=="Superviseur"){

                    Session::put('SemployeID',$employe->employeID);
                    Session::put('employeNom',$employe->nom);
                    Session::put('employePrenom',$employe->prenom);
                    Session::put('employeNom',$employe->nom);
                    Session::put('SemployePoste',$employe->poste);   
                    Session::put('SlocaliteID',$employe->localiteID);

    				return redirect()->action('dashboardController@index')->with('employeID',$employe->employeID);
                    /*
                    ->with('employeID',$employe->employeID)
                                                                          ->with('poste',$employe->poste)
                                                                          ->with('localiteID',$employe->localiteID);
                    */
    			}
    		}
    		else
    		 return redirect()->action('authentificationCOntroller@index')->with('message','Vous avez pas assez de droit pour accéder a cette plateforme ');
            // view('espacePrive.authentification')->with('message','Mot de passe ou identifiant incorecte');


    	}
    	else 
            return redirect()->action('authentificationCOntroller@index')->with('message','Mot de passe ou identifiant incorecte');
    		//return view('espacePrive.authentification')->with('message','Mot de passe ou identifiant incorecte');


    }
}
