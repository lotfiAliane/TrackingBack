<?php namespace App\Http\Controllers;

use App\Client;
use App\espace_prive;
use App\Http\Requests;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Hash;
use Carbon\Carbon;



class ClientController extends Controller {


	//la page des clients

	public function index()
	{
		//return view('client');
		$clients = Client::paginate(2);

		return view('GestionClients.client',compact('clients'));
		//Ou on peut faire return view('client.blade.php')->with('client',$client);

	}

	//creation d'in nouveau client

	public function create()
	{
		return view('GestionClients.formulairecreation');
	}
	public function store(ClientRequest $request)
	{

		$ID=$request->get('identifiant');
		
			$espaceprive = espace_prive::create([
				'identifiant' => $request->get('identifiant'),
				'motDePasse' => $request->get('motDePasse')


			]);

     
      $password=$request->input('password');

$clients = Client::create ($request->all());


      $espaceprive->Client()->save($clients);


		return redirect('clients');

	}


	//detail d'un client

	public  function show($id)
	{


		$client = Client::findOrFail($id);

		return view ('GestionClients.show',compact('client'));
	}
	public function edit($id)
	{
		$client = Client::findOrFail($id);
		return view('GestionClients.edit', compact('client'));

	}

	//modifier un client

	public function update($id, Requests\UpdateClient $request)

	{
		$client = Client::findOrFail($id);




			$client->update($request->all());

			$espaceprive = espace_prive::findOrFail($client->espacePriveID);

			$espaceprive->update([

				'identifiant' => $request->get('identifiant'),
				'motDePasse' => Hash::make($request->get('motDePasse'))
			]);

			return redirect('clients');
		}


	//suprimer un  client

	public function destroy($id)
	{
		$client = Client::findOrFail($id);

		$espaceprive = espace_prive::findOrFail($client->espacePriveID);

		$espaceprive->delete();

		$client->delete();

		return redirect('clients');
	}

	//chercher un  client

	public function search(){

		$match = Input::get('find');
		$par = Input::get('par');

		$clients = Client::where($par, 'LIKE', '%' . $match . '%')->paginate(5);

		return view('GestionClients.client', compact('clients', 'query'));
	}

}
