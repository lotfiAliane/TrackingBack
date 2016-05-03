<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\localite;
use App\wilaya;
use App\commune;
use App\employe;
use App\activite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Input;

use App\Http\Controllers\Controller;
use App\Http\Requests\localiteRequest;
use Session;


class dashboardController extends Controller
{
    //
    public function index(){
        
    	$employes=employe::all();
    	$ldate = date('Y-m-d');
    	
      $time = strtotime($ldate.'+1 days');
    $date2 = date('Y-m-d',$time);
    	$activite=Activite::where('dateEnregistrement','>=',$ldate)->where('dateEnregistrement','<=',$date2)->get();
    	
		$activiteNonAffecte=Activite::where('employeID','=','0');
		$activiteNonAcheve=Activite::where('statut','<>','Termine');
		$activiteTraite=Activite::where('statut','=','Termine');
    	return view('welcome',compact('employes','activite','activiteNonAffecte','activiteNonAcheve','activiteTraite'));

    }
}
