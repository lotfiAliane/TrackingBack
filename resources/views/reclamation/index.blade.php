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

        <!-- LA BARE DE RECHECRHE !-->

           <div class="form-group" >
      <div class="icon-addon addon-lg">
  {{ Form::open(array('url' => 'searchRec', 'method' => 'POST', 'class' => 'form navbar-form navbar-right searchform')) }}
      
   <select class="form-control" id="par" name="par" >
                                   <option value="NomClient"> NomClient</option>
                                   <option value="codeBordereau">N°colis</option>
                                   <option value="Statut">Statut</option>
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
            <!-- fin BARRE DE RECHERCHE !-->
      
        <div class="panel panel-primary">
         <div class="panel-heading">
        <h3 class="panel-title">Liste des réclamations</h3>

      </div>

      <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>codeBordereau</th>
            <th>Nom Client</th>
            <th>Motif D'appel</th>
            <th>Commentaire</th>
            <th>Statut</th>
             <th>Date</th>
             <th>Modifier</th>
             <th>Supprimer</th>
           
            
          </tr>
        </thead>
        <tbody>
          @foreach($reclamations as $reclamation)
            <tr>
              <td class="text-primary">
                <strong> {!!$reclamation->codeBordereau!!}</strong>  
              </td>
              <td class="text-primary">
                <strong> {!!$reclamation->NomClient!!}</strong> 
              </td>
              <td class="text-primary">                                             
                <strong> {!!$reclamation->MotifDappel!!}</strong>  
              </td>
              <td class="text-primary">
                <strong> {!!$reclamation->Commentaire!!}</strong> 
              </td>
              <td class="text-primary">
                <strong> {!!$reclamation->Statut!!}</strong> 
              </td>
              <td class="text-primary">
                <strong> {!!$reclamation->date!!}</strong>  
              </td>
 

              <!-- le boutton editer !-->           
              <td class="text-primary">
                 <strong> 
                   <a class="btn btn-primary" href="{{route('reclamation.edit',$reclamation->ReclamationID)}}"> editer</a>
                 </strong>  
              </td>
              <!-- la popup de suppression !-->
              <td class="text-primary">
                  <a class='btn  btn-danger'  data-toggle="modal" data-target="#myModal" onclick="getID({{$reclamation->ReclamationID}})">
                    Delete
                  </a>
              </td>

          @endforeach

            <!-- la pagination !-->
           <?php echo $reclamations->render(); ?>
        </tbody>

      </table>  
      <!-- include la popup  !-->
     @include('reclamation.modal_confirm')


    </div>
 
                              <div>
                                <p>
                                   <a class=" btn btn-info pull-right block" href="{{route('reclamation.create')}}"> Ajouter une reclamation</a> 
                                </p>
                              </div>
 
<script >
                 function getID($id)
                       {
                          document.getElementById("header").innerHTML ='Confirmation';
                          document.getElementById("message").innerHTML = "Voulez-Vous Vraiment Supprimer cet réclamation ?";
                          document.getElementById("footer").innerHTML = 
                             '<form method="POST" action="reclamation/'+$id+'">'+
                                  '<input name="_token" type="hidden" value="{{ csrf_token() }}">'+
                                    '<input type="hidden" name="_method" value="Delete">'+
                                  '<div>'+
                                      '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                                      '<button type="submit" class="btn btn-primary">Valider</button>'+
                                  '</div>'
                              '</form>';
                       }
</script>

@stop