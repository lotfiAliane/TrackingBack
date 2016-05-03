<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class usersController extends Controller
{
    //
    public function index(){

    	return view('formulaire.info');

    }
	public function create(){
		return view('formulaire.info');

	}


    public function getInfo(){

    	return view('formulaire.info ');
    }

    public function store(Request $request){

    	
    }
}
