<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\reclamation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;



class ReclamationController extends Controller
{
    // l'index la page principale
    
    public function index(){

    
    //recuperaion des données de la table reclamation 
     $reclamations = reclamation::paginate(5);
    

        
    	return view('reclamation.index',compact('reclamations'));
    }

    //fonction de create
     public function create(){
      $reclamation= new reclamation();
    
      return view('reclamation.create',compact('reclamation'));

    }
// fonction edit
                      public function edit($id){
                        $reclamation=reclamation::find($id);
                    
                      
                        return view('reclamation.edit',compact('reclamation'));
                      }
//fonction store

     
           
             
                         public function store(Request $request){
                            $input = Input::all();
                            $validation = Validator::make($input, reclamation::$rules);

                    if ($validation->passes()){
                       $reclamation=reclamation::Create($request->all());
                    if($reclamation){

                    \Session::flash('message','reclamation ajoutée avec succée ');
                       return redirect(route('reclamation.index'));
                    }
                    return redirect(route('reclamation.index'));
                    }
                   return Redirect::route('reclamation.create')
                        ->withInput()
                        ->withErrors($validation)
                        ->with('message', 'There were validation errors.');

                }



             public function update($id,Request $request){
                
                $reclamation=reclamation::findOrFail($id);
                
                $reclamation->update($request->all());
     
               return redirect(route('reclamation.index'));
                    
                  }


  



// la fonction de recherche

               public function searchRec(){

                     $match = Input::get('find');
                     $par = Input::get('par');


                     //recuperaion des données de la tavle suiviactif grouper par le code borderau
                     $reclamations=reclamation::all();
                     //requete de recherche
                     $reclamations = reclamation::where($par, 'LIKE', '%' . $match . '%')->paginate(5);

                     return view('reclamation.index', compact('reclamations', 'query'));
                  }
                 

 //supprimer une reclamation
                  public function destroy($id){

      $reclamation = reclamation::find($id);
      $reclamation->delete();

  return redirect('reclamation');
    }

//////////

   
 
   } 
      
   

    

