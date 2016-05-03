<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests\ContactRequest;
use App\Http\Requests;

use App\Http\Controllers\Controller;

class preuveController extends Controller
{
    //
    public function index(){

    	return view('PreuveLivraison.index');
    }

    public function envoie(ContactRequest $request){
    	$data=$request->all();
    	

    		
    	
Mail::send('PreuveLivraison.contenue', array('name'=>$request->nom,'firstname'=>$request->prenom), function($message) use ($data)
		{

			if (file_exists ( public_path().'\\'.$data['raisonSociale'].'.jpg')){
			$message->to($data['email'])->subject('Contact');
			
    	

			$message->attach(public_path().'\\'.$data['raisonSociale'].'.jpg');
		}
		else {
			return redirect()->back()->with('message','la preuve est introuvable');
		}
		});

		 return redirect()->back();

    }
}
