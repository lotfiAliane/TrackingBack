<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\wilaya;
use App\secteur;
use App\commune;
use App\employe_secteur;
use App\espace_prive;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\employe;
use Input;
use App\localite;
use Illuminate\Support\Facades\Session;



class employeController extends Controller
{
    //
    
    public function index(){

    	$employes=employe::paginate(5);
      $secteurs=employe_secteur::all();
      $mes_secteur=secteur::all();
  
    	return view('employe.index',compact('employes','secteurs','mes_secteur'));

    }


    public function create(){
    	$employe= new employe();
      $localites = localite::all();
       $secteurs = secteur::all();
       $employe_secteur = employe_secteur::all();
  	
    	return view('employe.create',compact('employe','localites','secteurs','employe_secteur'));

    }

   	public function edit($id){
      
   		$employe=employe::find($id);
      
        
              
      //$localite=localite::findOrFail($employe->localiteID);

      $localites=localite::all();
       $secteurs = secteur::all();
       $employe_secteur=employe_secteur::all();

   		if (is_null($employe))
        {
            return Redirect::route('employes.index');
        }
   	
    	return view('employe.edit',compact('employe', 'localites','secteurs','employe_secteur'));
   	}

   	public function update($id,Request $request){
   		
   		
     


      $civilite=$request->input('civilite');
      $nom=$request->input('nom');
      $prenom=$request->input('prenom');
      $poste=$request->input('poste');
      $email=$request->input('email');
      $tel=$request->input('tel');
      $telfix=$request->input('telfix');
      $telfax=$request->input('telfax');
      $localite=$request->input('localite');

       $secteur=$request->input('secteur');
      
     

      $ID=$request->input('Identifiant');
      $password=$request->input('password');

     

     $input = Input::all();
        $validation = Validator::make($input, employe::$rules);
        if ($validation->passes())
        {  

          $employe=employe::find($id);
          $employe->update(
           array(
           'civilite' => $civilite, 
           'nom' => $nom,
           'prenom' => $prenom, 
           'poste' => $poste,
           'email' => $email, 
           'tel' => $tel,
           'telfix' => $telfix, 
           'telfax' => $telfax,           
           'localiteID' => $localite,
          
          
            ));
          



        employe_secteur::where('employeID' ,'=', $id)->delete();

        $secteurs=secteur::all();


       
       foreach($secteurs as $secteur)
           {   

              if($request->input('name'.$secteur->secteurID)!=null)
              {     
                      
            
                      employe_secteur::create(
                      array(

                        'employeID' => $id,
                        'secteurID' => $secteur->secteurID)
                      );
              }     
          }
 
      
            

            
           return redirect(route('employe.index'));
        }
        if ($ID =!null && $password=!null){
           
          $espace_prive=espace_prive::where('espacePriveID', '=' ,$employe->espacePriveID);
          
          $employe_secteur=employe_secteur::where('employeSecteurID', '=' ,$employe->employeSecteurID);

          $espace_prive->update(
        array(
        'identifiant' => $ID,
        'motDePasse' => $password
        ));
         }
return Redirect::route('employe.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
          }
   	




    public function store(Request $request){


      $civilite=$request->input('civilite');
      $nom=$request->input('nom');
      $prenom=$request->input('prenom');
      $poste=$request->input('poste');
      $email=$request->input('email');
      $tel=$request->input('tel');
      $telfix=$request->input('telfix');
      $telfax=$request->input('telfax');
      $localite=$request->input('localite');
     

      $ID=$request->input('Identifiant');
      $password=$request->input('password');



      espace_prive::create(
        array(
        'identifiant' => $ID,
        'motDePasse' => $password
        ));

      $IDespace = espace_prive::where('identifiant', 'like', $ID)->where('motDePasse', 'like', $password)->get()->lists('espacePriveID')[0];





   	//	$employe=employe::Create($request->all());
   		
        

        $input = Input::all();
        $validation = Validator::make($input, employe::$rules);

        if ($validation->passes())
        {
          //  employe::create($input);


          employe::create(
         array(
                     'civilite' => $civilite, 
           'nom' => $nom,
           'prenom' => $prenom, 
           'poste' => $poste,
           'email' => $email, 
           'tel' => $tel,
           'telfix' => $telfix, 
           'telfax' => $telfax,           
            'localiteID' => $localite,
            'espacePriveID' => $IDespace
            ));


          $employe=employe::where('espacePriveID', '=' , $IDespace)->get();

          
         

          for($i=1 ; $i <= secteur::count() ; $i++)
           {
              if($request->input('name'.$i)!=null)
              {     
                     employe_secteur::create(
                      array(
                        'secteurID' => $i,
                        'employeID' => $employe->lists('employeID')[0])
                        
                      );
              }     
          }

            return Redirect::route('employe.index')->with('message','employé ajouté avec succé' );
        }

        return Redirect::route('employe.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');

   	}
   	public function show($id){


   	}
   	public function destroy($id){

   		$employe = employe::find($id);
   		$employe->delete();

	return redirect('employe');
   	}


   public function search(){

      $match = Input::get('find');
       $par = Input::get('par');
        $secteurs = employe_secteur::all();
         $mes_secteur=secteur::all();
    
    $employes = employe::where($par, 'LIKE', '%' . $match . '%')->paginate(5);
    return view('employe.index', compact('employes', 'query','secteurs','mes_secteur'));
    }
  
    
}
    

