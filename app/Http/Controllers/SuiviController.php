<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\suiviactif;
use App\espace_prive;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\client;
use DB;
use App\commande;
use App\actif;


class SuiviController extends Controller
{
    // l'index la page principale
    
    public function index(){

    
    //recuperaion des données de la tavle suiviactif grouper par le code borderau
     $suiviactifs=suiviactif::groupBy('codeBordereau')->paginate(5);
    //recuperation des données de la table suivi actif
     $suiviactifadress=suiviactif::all();
     //recuepartion des info(clientID , nom )de la table client
     $clients=client::all();
     //recuperation du commandeID de la ytable commande
     $commandes= commande::all();
     //recupeartion du code produit= code bordereau de la table actif
     $actifs=actif::all();

        
    	return view('Livraison.index',compact('suiviactifs','clients','commandes','actifs','suiviactifadress'));
    }
// la fonction de recherche

 public function recherche(){

      $match = Input::get('find');
       $par = Input::get('par');


       //recuperaion des données de la tavle suiviactif grouper par le code borderau
     $suiviactifs=suiviactif::all();
    //recuperation des données de la table suivi actif
     $suiviactifadress=suiviactif::all();
     //recuepartion des info(clientID , nom )de la table client
     $clients=client::all();
     //recuperation du commandeID de la ytable commande
     $commandes= commande::all();
     //recupeartion du code produit= code bordereau de la table actif
     $actifs=actif::all();

       
    
    $suiviactifs = suiviactif::groupBy('codeBordereau')->where($par, 'LIKE', '%' . $match . '%')->paginate(5);


    



    return view('Livraison.index', compact('suiviactifs', 'query','suiviactifadress','clients','commandes','actifs'));



    }


   }
