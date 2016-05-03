@extends('app')

@section('content')
 <script src="js/jquery-2.1.0.min.js"/>
    <script src="js/jquery-1.11.4.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      
      changeMonth: true,
      changeYear: true

    });
    
  });
  </script>

 
 




     <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    Gestion des activités
                    
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                        <li class="active">Gestion des activités</li>
                    </ol>
                </section>

          </br>
          </br>


          <div class="form-group" >
      <div class="icon-addon addon-lg">
  {{ Form::open(array('url' => 'searchActivite', 'method' => 'POST', 'class' => 'form navbar-form navbar-right searchform')) }}
      
   <input type="text" id="datepicker" name="datepicker" class="form-control" placeholder="Rechercher">

     {!! Form::submit('Rechercher',
                                array('class'=>'btn btn-default')) !!}
                    {{ Form::close() }} 
    </div>
    </div  >

<br>  </br>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Liste des Activités</h3>
      </div>

    <div class="table-responsive">
      <table class="table"  id='example1'>
        <thead>
          <tr>

            <th>Date d'Enregistrement</th>
            <th>Type</th>
            <th>Date Fin</th>
            <th>Nom Client</th>
            <th>statut</th>
            <th>Agent</th>
            <th>Affecter Agent</th>
            <th>Modifier</th>
            <th>Supprimer</th>
          </tr>
        </thead>
    
    <tbody>

      @foreach($activites as $activite)

        <tr>

           <td class="text-primary">

                  <strong> {{$activite->dateEnregistrement}} </strong>
           </td>


        	 <td class="text-primary">
             	 <strong> {{$activite->type}} </strong>
        	 </td>

          	
         	<td class="text-primary"> 
              
              @if($activite->dateFin == null)
             	    <strong> -- </strong>
              @else
                 <strong> {{$activite->dateFin}} </strong>
              @endif
         	 </td>

	         <td class="text-primary"> 

              @foreach($commandes as $commande)

                  @foreach($clients as $client)

                    @if( ( $commande->commandeID== $activite->commandeID ) AND ($commande->clientID == $client->clientID) ) 

                         <strong>{{$client->nom}}  {{$client->prenom}} </strong>

                    @endif

                  @endforeach
              @endforeach

	          </td>

           <td class="text-primary"> 

                @if($activite->statut == 'non active')
                 <strong> <a class="btn btn-warning" href="#"> {{ $activite->statut }}  </a> </strong>
                @elseif($activite->statut == 'active')
                     <strong> <a class="btn btn-primary" href="#"> {{ $activite->statut }}  </a> </strong>
                @elseif($activite->statut == 'pause')
                     <strong> <a class="btn btn-danger" href="#"> {{ $activite->statut }}  </a> </strong>
                @else
                    <strong> <a class="btn btn-success" href="#"> {{ $activite->statut }}  </a> </strong>

                @endif

                
            </td>



	          <td class="text-primary"> 

                @if($activite->employeID == null)
	                 <strong> --  </strong>
                @else

                  @foreach($employes as $employe)

                    @if($activite->employeID == $employe->employeID)

                         <strong> {{$employe->nom}}  {{$employe->prenom}} </strong>

                    @endif

                  @endforeach

                @endif
	              
	          </td>

	            <td class="text-primary"> 
	              <strong> <a class="btn btn-success" href="activite/affectation/{{$activite->activiteID}}"> Affecter  </a> </strong>
	          </td>
	        
	          <td class="text-primary"> 

              {!! Form::open(array('method' => 'GET', 'url' => array('activite/modifier', $activite->activiteID))) !!}
              {!! Form::submit('Modifier', array('class' => 'btn btn-primary')) !!}
              {!! Form::close() !!}

          </td>
	        
	          <td class="text-primary"> 

	         	     <strong><a class="btn btn-danger" data-toggle="modal" data-target="#myModal" name={{$activite->activiteID}} onclick="getID({{$activite->activiteID}})"> Supprimer </a></strong>

	          </td>
        
    	</tr>

    @endforeach

       </tbody>
	</table>
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="Confirmation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="header"></h4>
      </div>
      <div class="modal-body" id="message1">

        
      </div>


      <div class="modal-footer" id="footer">
        
      </div>
    </div>
  </div>
</div>


<script language="Javascript">  

 function getID($id)
   {
      document.getElementById("header").innerHTML ="Confirmation";
      document.getElementById("message1").innerHTML = "Voulez-Vous Vraiment Supprimer cette Activité ?";
      document.getElementById("footer").innerHTML = 
         '<form method="POST" action="activite/'+$id+'">'+
              '<input name="_token" type="hidden" value="{{ csrf_token() }}"'+
              '<div>'+
                  '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                  '<button type="submit" class="btn btn-primary">Valider</button>'+
              '</div>'
          '</form>';
   }

</script>

@endsection