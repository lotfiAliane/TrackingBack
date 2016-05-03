<?php
use Illuminate\Support\Facades\Input;
use App\employe;
use App\localite;
use App\localisation;
use App\Client;
use App\preuve;
use App\Commande;
use App\actif;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('com',function(){
dd("rien");

});
Route::post('searchLocalite','localiteController@search');
Route::post('find', array('before' => 'csrf', function() {
    $match = Input::get('find');
    $employes=employe::all();
    $localites = localite::with('employe')->where('libelleLocalite', 'LIKE', '%' . $match . '%')->paginate(5);
   
    
}));



Route::get('preuvve',function(){
$par=Input::get('code');
$match=$par;
$actifs=actif::where('codeProduit','=',$match)->get();
//$com=$actifs->destinataireID;
//$client=Client::where('clientID','=',$com)->get();

return response()->json($actifs);

});
Route::get('clientpreuve',function(){
$par=Input::get('DesinataireID');
$match=$par;
$client=client::where('clientID','=',$match)->get();
//$com=$actifs->destinataireID;
//$client=Client::where('clientID','=',$com)->get();

return response()->json($client);

});
Route::get('imagepreuve',function(){

$bordereau=Input::get('code');
$code=$bordereau;


$image=preuve::where('codeBordereau','=',$code)->get();
   return response()->json($image);

}); 
Route::post('localite/{id}','localiteController@destroy');
Route::post('localite/{id}','localiteController@update');
//Route::post('superviseur/{id}','localiteController@update');
Route::get('localitechange','localiteController@change');
Route::get('loadsubcat/','localiteController@load');
Route::get('localite/{id}/communes','localiteController@communes');
Route::get('/communes','localiteController@communes');
Route::get('region','localiteController@regions');
Route::resource('localite','localiteController');
Route::resource('form','usersController');
Route::resource('test','testController',['only'=>['create','store','update','show','index','edit']]);
Route::get('loadcomune',function(){
$communes=communes::all();
dd($communes);
return Response::make($communes);
	});
Route::get('aucune',function(){
	
/*
$communes=commune::all();

return Response::json($communes);*/

$towns = localite::all();
return response()->json($towns);

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::post('authen','authentificationCOntroller@auth');
Route::get('oublier','authentificationCOntroller@preoublier');
Route::post('postoublier','authentificationCOntroller@postoublier');
Route::resource('authentification','authentificationCOntroller');

Route::group(['middleware' => ['web','conecte']], function () {
    Route::get('logout','authentificationCOntroller@log');
    Route::resource('localite','localiteController');
    Route::resource('employe','employeController');
Route::post('searchEmploye','employeController@search');
Route::post('employe/{id}','employeController@destroy');

Route::get('users', 'UsersController@getInfos');

Route::post('users', 'UsersController@postInfos');

Route::get('secteur', 'SecteurController@index');

Route::post('searchSecteur', 'SecteurController@search');

Route::get('secteur/ajouter', 'SecteurController@getAjouter');

Route::post('secteur', 'SecteurController@postAjouter');

Route::post('secteur/{id}' , 'SecteurController@postSupprimer');

Route::get('secteur/modifier/{id}' , 'SecteurController@getModifier' );

Route::PATCH('secteur/secteur/{id}', 'SecteurController@postModifier');

Route::get('secteur/affectation/{id}', 'SecteurController@getAffectation');

Route::post('secteur/affectation/{id}','SecteurController@postAffectation');

Route::get('/clients','ClientController@index');

Route::get('/clients/create','ClientController@create');
Route::post('/clients', 'ClientController@store');
Route::get('/clients/{id}','ClientController@show');
Route::get('/clients/{id}/edit','ClientController@edit');
Route::put('/clients/{id}','ClientController@update');
Route::patch('/clients/{id}','ClientController@update');
Route::post('/clients/{id}/delete','ClientController@destroy');
Route::post('searchClient','ClientController@search');
Route::resource('suivi','SuiviController');
Route::post('searchSuivi','SuiviController@recherche');

Route::get('activite','ActiviteController@index');

Route::post('activite/{id}','ActiviteController@postSupprimer');

Route::get('activite/affectation/{id}','ActiviteController@getAffectation');

Route::post('activite/affectation/{id}','ActiviteController@postAffectation');

Route::get('activite/modifier/{id}' , 'ActiviteController@getModifier' );

Route::PATCH('activite/modifier/{id}', 'ActiviteController@postModifier');

Route::post('searchActivite','ActiviteController@search');

Route::resource('preuve','preuveController');
Route::post('email','preuveController@envoie');
Route::resource('dashboard','dashboardController');
Route::get('activiteDuJour','ActiviteController@jour');
Route::get('activiteNonAffecte','ActiviteController@nonafecte');
Route::get('activiteNonTraite','ActiviteController@nontraite');
Route::get('activiteTraite','ActiviteController@traite');
Route::post('searchRec','ReclamationController@searchRec');
Route::resource('reclamation','ReclamationController');






Route::post('searchLocalite','localiteController@search');
Route::post('find', array('before' => 'csrf', function() {
    $match = Input::get('find');
    $employes=employe::all();
    $localites = localite::with('employe')->where('libelleLocalite', 'LIKE', '%' . $match . '%')->paginate(5);
   
    
}));



Route::get('preuvve',function(){
$par=Input::get('code');
$match=$par;
$actifs=actif::where('codeProduit','=',$match)->get();
//$com=$actifs->destinataireID;
//$client=Client::where('clientID','=',$com)->get();

return response()->json($actifs);

});
Route::get('clientpreuve',function(){
$par=Input::get('DesinataireID');
$match=$par;
$client=client::where('clientID','=',$match)->get();
//$com=$actifs->destinataireID;
//$client=Client::where('clientID','=',$com)->get();

return response()->json($client);

});
Route::get('imagepreuve',function(){

$bordereau=Input::get('code');
$code=$bordereau;


$image=preuve::where('codeBordereau','=',$code)->get();
   return response()->json($image);

}); 
Route::post('localite/{id}','localiteController@destroy');
Route::post('localite/{id}','localiteController@update');
//Route::post('superviseur/{id}','localiteController@update');
Route::get('localitechange','localiteController@change');
Route::get('loadsubcat/','localiteController@load');
Route::get('localite/{id}/communes','localiteController@communes');
Route::get('/communes','localiteController@communes');
Route::get('region','localiteController@regions');
Route::resource('localite','localiteController');
Route::resource('form','usersController');
Route::resource('test','testController',['only'=>['create','store','update','show','index','edit']]);
Route::get('loadcomune',function(){
$communes=communes::all();
dd($communes);
return Response::make($communes);
    });
Route::get('aucune',function(){
    
/*
$communes=commune::all();

return Response::json($communes);*/

$towns = localite::all();
return response()->json($towns);

});
























// geolocalisation 





Route::get('localisation',function(){
$par=Input::get('employe');
$m=$par;
$cordinate=localisation::where('employeID','=', $m)->get();
return response()->json($cordinate);



});
Route::get('geo',function(){

$coordone=localisation::all()->last();
$employes=employe::where('localiteID','=',Session::get('SlocaliteID'))->get();
$localiteID=Session::get('SlocaliteID');

        // Add information window for each address
        $collection = localisation::with('employe')->whereHas('employe',function($q){
            return $q->where('localiteID','=',Session::get('SlocaliteID'));
        })->get();
        Mapper::map($coordone->latitude,$coordone->longitude, ['marker' => false])->polyline([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['strokeColor' => '#000000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2]);
  

        $collection->each(function($address){
            $content = $address->nom;

            Mapper::marker($address->latitude,$address->longitude );

           // Mapper::informationWindow($address->latitude, $address->longitude, $content);
        });


        return view('geolocalisation.index',compact('collection','coordone','employes'));


});





});





