@extends('app')
@section('content')



       <!--message de validation !-->
        <div class="container">
            @if (Session::has('message'))
                <div class="alert alert-info" role="alert">

                    <p class="text-primary">{{ Session::get('message') }}</p>
                </div>
            @endif

           
        </div>
        <!-- fin message de validation !-->
        <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    Gestion des employés
                    
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                        <li class="active">Gestion des employés</li>
                    </ol>
                </section>

    <div class="form-group" >
      <div class="icon-addon addon-lg">
  {{ Form::open(array('url' => 'searchEmploye', 'method' => 'POST', 'class' => 'form navbar-form navbar-right searchform')) }}
      
  <select class="form-control" id="par" name="par">
    
    <option value="nom">Nom</option>
    <option value="prenom">Prenom</option>
    <option value="poste">Poste</option>
    
  </select>
      {!! Form::text('find', null,
                           array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Rechercher...')) !!}
     {!! Form::submit('Rechercher',
                                array('class'=>'btn btn-default')) !!}
                    {{ Form::close() }} 
    </div>
    </div  >

<br>  </br>

        <div class="panel panel-primary">
			   <div class="panel-heading">
				<h3 class="panel-title">Liste des employés</h3>

			</div>

			<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Civilité</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Profil</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Fixe</th>
						
						<th>Agence</th>
						<th>secteur</th>
						<th>Modifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
					@foreach($employes as $employe)
						<tr>
							<td class="text-primary">
								<strong> {!!$employe->civilite!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> {!!$employe->nom!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> {!!$employe->prenom!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> {!!$employe->poste!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> {!!$employe->email!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> 0{!!$employe->tel!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> 0{!!$employe->telfix!!}</strong>	
							</td>
							

							<td class="text-primary">
								<strong> 
                       <?php 
									       $contact = \DB::table('localite')->where('localiteID', $employe->localiteID)->first(); 
		                	?>
									     @if($contact)
                         {{$contact->libelleLocalite}}
                       @endif
                </strong>
              </td>    	        

                             
							<td class="text-primary" >
						      <strong> 
                       <?php $j=0;?>
                         @foreach($secteurs as $employe_sec)
                					 @if($employe_sec->employeID == $employe->employeID)
                 							 <?php $j = $j+1; ?>
               						 @endif
             						 @endforeach
                          <a href="#" data-toggle="modal" data-target="#myModal"  onclick="getSecteurs({{$employe->employeID}},{{$secteurs}},{{$mes_secteur}})"> {{$j}} </a>
									</strong>
							</td>
							

   
  <!-- le boutton editer !-->           
              <td class="text-primary">
							   <strong> 
                   <a class="btn btn-primary" href="{{route('employe.edit',$employe->employeID)}}"> editer</a>
                 </strong>	
							</td>
  
  <!-- la popup de suppression !-->
							<td class="text-primary">
                  <a class='btn  btn-danger'  data-toggle="modal" data-target="#myModal" onclick="getID({{$employe->employeID}})">
                    Delete
                  </a>
              </td>
	
						</tr>

					@endforeach

            <!-- la pagination !-->
					 <?php echo $employes->render(); ?>
				</tbody>

			</table>	

		</div>
 

 <!-- le script de la popup de la suppresion !-->
		    <script >
                 function getID($id)
                       {
                          document.getElementById("header").innerHTML ='Confirmation';
                          document.getElementById("message").innerHTML = "Voulez-Vous Vraiment Supprimer cet employé ?";
                          document.getElementById("footer").innerHTML = 
                             '<form method="POST" action="employe/'+$id+'">'+
                                  '<input name="_token" type="hidden" value="{{ csrf_token() }}">'+
                                    '<input type="hidden" name="_method" value="Delete">'+
                                  '<div>'+
                                      '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                                      '<button type="submit" class="btn btn-primary">Valider</button>'+
                                  '</div>'
                              '</form>';
                       }

               
                  function getSecteurs($id,$secteurs,$mes_secteur)
                  {
                  	$liste="<ul class='list-group'>";

                        $num=1;

                          for(var i=0 in $secteurs)
                          {
                            if($secteurs[i].employeID == $id)
                            {
                                for(var j=0 in $mes_secteur)
                               {
                                  if($secteurs[i].secteurID == $mes_secteur[j].secteurID)
                                  {
                                      $liste=$liste+"<li class='list-group-item'>"+$num+" - "+$mes_secteur[j].lebelle+" </li>";
                                      $num=$num+1;
                                  }
                                } 
                            }
                          } 

                        $liste=$liste+"</ul>";
                       
                       document.getElementById("header").innerHTML = "Liste des Secteurs de l'Employé  :" ;

                        document.getElementById("message").innerHTML = "<strong>"+$liste+"</strong>";
                        
                        document.getElementById("footer").innerHTML = '<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>';

                  }

           </script>
  <!-- fin script de daffectation d'un employé a plusieurs secteur !-->

   <!-- le boutton ajouter un employé !-->
                          		<div>
                          			<p>
                          		     <a class=" btn btn-info pull-right block" href="{{route('employe.create')}}"> Ajouter un employé</a>	
                          		  </p>
                          		</div>

  <!-- include la popup  !-->
		 @include('employe.modal_confirm')

  <!-- la validation !-->
		@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
   @endif


@stop