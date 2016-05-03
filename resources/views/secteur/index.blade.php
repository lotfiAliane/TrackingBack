@extends('app')
@section('content')


<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    Gestion des secteurs activités
                    
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                        <li class="active">Gestion des secteurs activités</li>
                    </ol>
                </section>
<div class="form-group" >
      <div class="icon-addon addon-lg">
  {{ Form::open(array('url' => 'searchSecteur', 'method' => 'POST', 'class' => 'form navbar-form navbar-right searchform')) }}
      
  <select class="form-control" id="par" name="par">
    
   
    <option value="lebelle">Libelle</option>
    
    
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
        <h3 class="panel-title">Liste des secteurs d'activités</h3>
      </div>

    <div class="table-responsive">
      <table class="table"  id='example1'>
        <thead>
          <tr>
            <th>Lebelle</th>
            <th>Wilaya</th>
            <th>Commune</th>
            <th>Nombre d'Agent affectés</th>
            <th>Affecter agent</th>
            <th>Modifier</th>
            <th>Supprimer</th>
          </tr>
        </thead>
    
    <tbody>


       @foreach($secteurs as $secteur)
        <tr>
         <td class="text-primary">
              <strong>{{$secteur->lebelle}}</strong>
         </td>

          <td class="text-primary">
              @foreach($wilayas as $wilaya)
              @if($wilaya->wilayaID == $secteur->WilayaID)
                  <strong> {{$wilaya->intitule}}</strong>
              @endif
              @endforeach
         </td>

         <td class="text-primary"> 
        
          <?php $i=0;?>

              @foreach($villes as $ville)
                @if($ville->secteurID == $secteur->secteurID)
                  <?php $i = $i+1; ?>
                @endif
              @endforeach

              <strong> <a href="#" data-toggle="modal" data-target="#myModal" onclick="getCommunes({{$secteur->secteurID}},{{$villes}},'{{$secteur->lebelle}}')"> {{$i}} </a> </strong>
          </td>

        
        
         <td class="text-primary"> 

              <?php $j=0;?>

              @foreach($employe_secteur as $employe_sec)
                @if($employe_sec->secteurID == $secteur->secteurID)
                  <?php $j = $j+1; ?>
                @endif
              @endforeach

              

              <strong><a href="#" data-toggle="modal" data-target="#myModal" onclick="getAgents({{$secteur->secteurID}},'{{$secteur->lebelle}}',{{$employes}},{{$employe_secteur}})">{{$j}}</a>
          </td>


            <td class="text-primary"> 
              <strong> <a class="btn btn-success" href="secteur/affectation/{{$secteur->secteurID}}"> Affecter </a> </strong>
          </td>
        
          <td class="text-primary"> 
             <!-- <strong><a class="btn btn-primary" href="#"> Modifier </a></strong> -->


              {!! Form::open(array('method' => 'GET', 'url' => array('secteur/modifier', $secteur->secteurID))) !!}
              {!! Form::submit('Modifier', array('class' => 'btn btn-primary')) !!}
              {!! Form::close() !!}

          </td>
        
          <td class="text-primary"> 
              <!--<strong><a class="btn btn-warning" href="#" name={{$secteur->secteurID}}> Supprimer </a></strong>-->

     <!--       {!! Form::open(array('method' => 'POST', 'url' => array('secteur', $secteur->secteurID))) !!}
                {!! Form::submit('Supprimer', array('class' => 'btn btn-warning', 'onclick' => 'return confirm(\'Vraiment supprimer cet enregoistrement ?\')')) !!}
            {!! Form::close() !!}



 
           {!! Form::open(array('method' => 'POST', 'url' => array('secteur', $secteur->secteurID))) !!}
                {!! Form::submit('Supprimer', array('class' => 'btn btn-warning', 
                    'data-toggle' => 'modal', 'data-target' => '#myModal')) !!}
            {!! Form::close() !!} -->
          <strong><a class="btn btn-danger" data-toggle="modal" data-target="#myModal" name={{$secteur->secteurID}} onclick="getID({{$secteur->secteurID}})"> Supprimer </a></strong>
         
          </td>
        
          </tr>
          @endforeach
      {{$secteurs->render()}}
    </tbody>
  </table>
    </div>


<div>
  <p>
      <a class="btn btn-info pull-right" href="secteur/ajouter"> Ajouter un Secteur</a>
  </p>
</div>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="Confirmation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="header"></h4>
      </div>
      <div class="modal-body" id="message">
        
      </div>
      <div class="modal-footer" id="footer">
        
      </div>
    </div>
  </div>
</div>


<script language="Javascript">  

  
   function getAgents($id,$lebelle,$employes,$employe_secteur)
   {
      
      $liste="<ul class='list-group'>";

      $num=1;

        for(var i=0 in $employe_secteur)
        {
          if($employe_secteur[i].secteurID == $id)
          {
              for(var j=0 in $employes)
             {
                if($employe_secteur[i].employeID == $employes[j].employeID)
                {
                    $liste=$liste+"<li class='list-group-item'>"+$num+" - "+$employes[j].nom+"   "+$employes[j].prenom+"</li>";
                    $num=$num+1;
                }
              } 
          }
        } 

      $liste=$liste+"</ul>";
     
      document.getElementById("header").innerHTML = "Liste des agents de secteur  : <strong>"+$lebelle+"</strong>";

      document.getElementById("message").innerHTML = "<strong>"+$liste+"</strong>";
      
      document.getElementById("footer").innerHTML = '<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>';

   }


   function getID($id)
   {
      document.getElementById("header").innerHTML ="Confirmation";
      document.getElementById("message").innerHTML = "Voulez-Vous Vraiment Supprimer ce Secteur d'Activité ?";
      document.getElementById("footer").innerHTML = 
         '<form method="POST" action="secteur/'+$id+'">'+
              '<input name="_token" type="hidden" value="{{ csrf_token() }}"'+
              '<div>'+
                  '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                  '<button type="submit" class="btn btn-primary">Valider</button>'+
              '</div>'
          '</form>';
   }



  function getCommunes($id, $villes, $lebelle)
   {  

    $liste="<ul class='list-group'>";
    $num=1;
      for(var i=0 in $villes) 
      {
          if($villes[i].secteurID == $id)
          {
            $liste=$liste+"<li class='list-group-item'>"+$num+" - "+$villes[i].ville+"</li>";
            $num=$num+1;
          }
      }
      $liste=$liste+"</ul>";

      document.getElementById("header").innerHTML ="Liste des Communes de secteur : <strong>"+$lebelle+"</strong>";

      document.getElementById("message").innerHTML = "<strong>"+$liste+"</strong>";
      
      document.getElementById("footer").innerHTML = '<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>';
   }

</script>

@endsection