<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\localite;
use App\wilaya;
use App\commune;
use App\employe;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Input;
use App\Http\Controllers\Controller;
use App\Http\Requests\localiteRequest;

class localiteController extends Controller
{
    //
    
    public function index(){

    	$localites=localite::with('employe')->paginate(5);

    	$employes=employe::where('poste','=', 'Superviseur')->get();

    	return view('localite.index',compact('localites','employes'));

    }


    public function create(){
    	$localite= new localite();
    	$wilayas=wilaya::all();
      $communes=new commune();
    	return view('Localite.create',compact('localite','wilayas','communes'));

    }

   	public function edit($id){
   		$localite=localite::findOrFail($id);
   		$wilayas=wilaya::all();
   		$communes=new commune();
    	return view('Localite.edit',compact('localite','wilayas','communes'));
   	}

/*public function update($id,Request $request){
   
      $localite=localite::findOrFail($id);
      $localite->update($request->all());
     
    return redirect(route('localite.index'));
    }*/
   	public function update($id,Request $request){
$localite=localite::findOrFail($id);

      if($request->employe){
        
      $employe=employe::find($request->employe);
    
        # code...
      $localite->employeID=$employe->employeID;
      $localite->save();
      return redirect(route('localite.index'))->with('message','le superviseur a bien été affectée');
      }
      else {
   	 $input = Input::all();
        $validation = Validator::make($input, localite::$rules);
        if ($validation->passes()){
   		$localite=localite::findOrFail($id);
    	$localite->update($request->all());
      
  
    	
		return redirect(route('localite.index'))->with('message','Localité modifiée avec succée');
  }
  return Redirect::route('localite.edit',$id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
          }
   	}
    public function change(){

      $towns = commune::find(1);
            return response()->json($towns);
      }
      
   	public function store(Request $request){
       $input = Input::all();
        $validation = Validator::make($input, localite::$rules);

        if ($validation->passes()){
   		$localite=localite::Create($request->all());
   		if($localite){

        \Session::flash('message','Localité ajoutée avec succée ');
           return redirect(route('localite.index'));
      }
        return redirect(route('localite.index'));
      }
       return Redirect::route('localite.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');

   	}
   	public function show($id){


   	}
   	public function destroy($id){

   		
      $localite = localite::find($id);
   		$localite->delete();
      $localites=localite::with('employe')->paginate(5);

      $employes=employe::all();
	return view('Localite.index',compact('localites','employes'));
   	}

    public function load(){
      dd("rien");
    $subcategories = ville::all();
    return View::make('localite.index', ['subcategories' => $subcategories]);
}

public function regions()
    {
      $par=Input::get('ville');
      
        // Retour des villes pour le pays sélectionné 
        //$s=commune::wherewilayawilayaID($id)->get();
      $m=$par;
        $communes=commune::where('wilayaID','=', $m)->get();
        return response()->json($communes);
    } 
    public function communes()
    {
      $par=Input::get('ville');

        // Retour des villes pour le pays sélectionné 
        //$s=commune::wherewilayawilayaID($id)->get();
      $m=$par;
        $communes=commune::where('wilayaID','=', $m)->get();
        return response()->json($communes);
    } 
    public function search(){
      $par=Input::get('par');
      $match = Input::get('find');
    $employes=employe::all();
    $localites = localite::with('employe')->where($par, 'LIKE', '%' . $match . '%')->paginate(5);
    return view('localite.index', compact('localites', 'query','employes'));
    }
}
