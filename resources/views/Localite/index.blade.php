@extends('app')
@section('content')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
<script src='lib/jquery.min.js'></script>
<script src='lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.js'></script>

<div class="container">
            @if (Session::has('message'))
                <div class="alert alert-info" role="alert">

                    <p class="text-primary">{{ Session::get('message') }}</p>
                </div>
            @endif

           
        </div>
	{!! Html::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js') !!}

 <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    Gestion des localités
                    
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                        <li class="active">Gestion des localités</li>
                    </ol>
                </section>
  @if(count($localites) != 0)
    <div class="form-group" >
      <div class="icon-addon addon-lg">
  {{ Form::open(array('url' => 'searchLocalite', 'method' => 'POST', 'class' => 'form navbar-form navbar-right searchform')) }}
      
  <select class="form-control" id="par" name="par">
    
    <option value="codepostale">Code Postale</option>
    <option value="libelleLocalite">Libelle</option>
    <option value="commune">Commune</option>
    
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
				<h3 class="panel-title">Liste des agences</h3>

			</div>
			<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Libelle</th>
						<th>Numero Rue</th>
						<th>Libelle Rue</th>
						<th>Code Postal</th>
						<th>Commune</th>
						<th>Ville</th>
						<th>Pays</th>
						<th>Superviseur</th>
						<th>Modifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
					@foreach($localites as $localite)

						<tr>
							<td class="text-primary">
								<strong> {!!$localite->libelleLocalite!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> {!!$localite->numrue!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> {!!$localite->libellerue!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> {!!$localite->codepostale!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> {!!$localite->commune!!}</strong>	
							</td>
							<td class="text-primary">
								<strong> <?php
                  $contact = \DB::table('wilaya')->where('wilayaID', $localite->ville)->first();



                  ?>
                  {{$contact->intitule}}
                </strong>	
							</td>
							<td class="text-primary">
								<strong> {!!$localite->pays!!}</strong>	
							</td>
							<td class="text-primary">
                @if($localite->employe)
								<strong> 
								
                
		
	<a class='btn btn-primary btn-sm'  data-toggle="modal" data-target="#myModal"  onclick="getlocalite({{$localite->localiteID}})">
             {{$localite->employe->nom}}
        </a>
  @else
	
                    
                  
                   

                 
                  <a class='btn btn-primary btn-sm'  data-toggle="modal" data-target="#myModal"  onclick="getlocalite({{$localite->localiteID}})">
             selectionner
        </a>
</strong>	
@endif
							</td>
							<td class="text-primary">
								<strong> <a class="btn btn-primary" href="{{route('localite.edit',$localite->localiteID)}}"> editer</a></strong>	
							</td>
							<td class="text-primary">
				
        <a class='btn  btn-danger'  data-toggle="modal" data-target="#myModal"  onclick="getID({{$localite->localiteID}})">
             Delete
        </a>
    			</td>
	
						</tr>

					@endforeach
          {{$localites->render()}}
				</tbody>

			</table>	

		</div>
		<div>
			<p>
		<a class=" btn btn-info pull-right" href="{{route('localite.create')}}"> Ajouter une agence</a>	
		</p>
		</div>
		<div>
			 
    	</div>

		@include('localite.modal_confirm')
	
    



  <div class="modal fade" id="modal-list" tabIndex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
               <form method="POST" action="{{route('localite.update',$localites)}}">
            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
            <input type="hidden" name="_method" value="PUT">
          </button>
          <h4 class="modal-title">Please Confirm</h4>
        </div>
        <div class="modal-body">
          <p class="lead">
            <i class="fa fa-question-circle fa-lg"></i>  
            Veuillez selectioner un superviseur pour cette agence
          </p>
        </div>
        <div class="modal-footer">
        	
        	<div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control" id="employe" name="employe">
  	@foreach($employes as $employe)
    <option value="{{$employe->employeID}}">{{$employe->nom}}</option>
    @endforeach
    
  </select>
</div>
            <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button>

            <button type="submit"  class="btn btn-danger">
              <i class="fa fa-times-circle"></i> Yes
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>	
  <script >
function getID($id)
   {
      document.getElementById("header").innerHTML ='Confirmation';
      document.getElementById("message").innerHTML = "Voulez-Vous Vraiment Supprimer ce Secteur d'Activité ?";
      document.getElementById("footer").innerHTML = 

         '<form method="POST" action="localite/'+$id+'">'+
              '<input name="_token" type="hidden" value="{{ csrf_token() }}">'+
                '<input type="hidden" name="_method" value="Delete">'+
              '<div>'+
                  '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                  '<button type="submit" class="btn btn-primary">Valider</button>'+
              '</div>'
          '</form>';
   }
  </script>
   <script >
function getlocaliteSelectionne($localite,$employeID,$employeNom)
   {
      document.getElementById("header").innerHTML ='Confirmation';
      document.getElementById("message").innerHTML = "Voulez-Vous Vraiment Supprimer ce Secteur d'Activité ?";
      document.getElementById("footer").innerHTML = 
         '<form method="POST" action="localite/'+$localite+'">'+
              '<input name="_token" type="hidden" value="{{ csrf_token() }}">'+
                '<input type="hidden" name="_method" value="PUT">'+
              '<div>'+
              '<label for="sel1">Select list:</label>'+
  '<select class="form-control" id="employe" name="employe">'+

    @foreach($employes as $employe)
    '<option value="{{$employe->employeID}}">{{$employe->nom}}</option>'+
    @endforeach
    
  '</select>'+
                  '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                  '<button type="submit" class="btn btn-primary">Valider</button>'+
              '</div>'
          '</form>';
   }
  </script>
  <script >
function getlocalite($localite)
   {
      document.getElementById("header").innerHTML ='Confirmation';
      document.getElementById("message").innerHTML = "Veuillez selectioner un superviseur pour cette agence";
      document.getElementById("footer").innerHTML = 
         '<form method="POST" action="localite/'+$localite+'">'+
              '<input name="_token" type="hidden" value="{{ csrf_token() }}">'+
                '<input type="hidden" name="_method" value="PUT">'+
              '<div>'+
              '<label for="sel1">Select list:</label>'+
  '<select class="form-control" id="employe" name="employe">'+

    @foreach($employes as $employe)
    '<option value="{{$employe->employeID}}">{{$employe->nom}}</option>'+
    @endforeach
    
  '</select>'+
                  '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                  '<button type="submit" class="btn btn-primary"  >Valider</button>'+
              '</div>'
          '</form>';
   }
  </script>
@else
<div>
      <p>
    <a class=" btn btn-info pull-right" href="{{route('localite.create')}}"> Ajouter une agence</a> 
    </p>
    </div>



@endif
<script type="text/javascript">
  $('.formConfirm').on('click', function(e) {
        e.preventDefault();
        var el = $(this).parent();
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');
        
        $('#formConfirm')
        .find('#frm_body').html(msg)
        .end().find('#frm_title').html(title)
        .end().modal('show');
        
        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);
  });

  $('#formConfirm').on('click', '#frm_submit', function(e) {
        var id = $(this).attr('data-form');
        $(id).submit();
  });
</script>
<script>
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
</script>
@stop
