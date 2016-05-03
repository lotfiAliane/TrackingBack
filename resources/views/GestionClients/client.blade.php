


@extends('app')
@section('content')

<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    Gestion des clients
                    
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Accueil</a></li>
                        <li class="active">Gestion des clients</li>
                    </ol>
                </section>

<div class="form-group" >
      <div class="icon-addon addon-lg">
  {{ Form::open(array('url' => 'searchClient', 'method' => 'POST', 'class' => 'form navbar-form navbar-right searchform')) }}
      
  <select class="form-control" id="par" name="par">
    
    <option value="nom">nom</option>
    <option value="prenom">Prenom</option>
    
    
  </select>
      {!! Form::text('find', null,
                           array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Rechercher...')) !!}
     {!! Form::submit('Search',
                                array('class'=>'btn btn-default')) !!}
                    {{ Form::close() }} 
    </div>
    </div  >

<br>  </br>

        <div class="panel panel-primary">
          <div class="panel-heading">
           <h3 class="panel-title">Liste des utilisateurs</h3>

       </div>


       <div class="table-responsive">
           <table class="table">
               <thead>
               <tr>

                   <th>Nom </th>
                   <th>Prenom</th>
                   <th>E-mail</th>
                   <th>Telephone</th>
                   <th>Raison sociale</th>
                   <th>Civilité</th>
                   <th>Modifier</th>
                   <th>Suprimer</th>

               </tr>
               </thead>
               <tbody>
               @foreach($clients as $client)


                   <tr>

                       <td class="text-primary">
                           <strong> {!!$client->nom!!}</strong>
                        </td>
                       {{--<td class="text-primary">
                           <strong> {!!$espace_prive->identifiant!!}</strong>
                        </td>--}}
                        <td class="text-primary">
                            <strong> {!!$client->prenom!!}</strong>
                        </td>
                        <td class="text-primary">
                            <strong> {!!$client->email!!}</strong>
                        </td>
                        <td class="text-primary">
                            <strong>0{!!$client->telMobile!!}</strong>
                        </td>
                        <td class="text-primary">
                            <strong> {!!$client->raisonSociale!!}</strong>
                        </td>
                        <td class="text-primary">
                            <strong> {!!$client->civilite!!}</strong>
                        </td>
                        <td class="text-primary">
                            <strong> <a class="btn btn-primary" href="{{ url('clients/'.$client->clientID.'/edit' ) }}">Modifier</a></strong>
                        </td>
                        <td class="text-primary">
                            <strong>

                                <a class="btn btn-warning" data-toggle="modal" data-target="#myModal" name={{$client->clientID}} onclick="getID({{$client->clientID}})"> Supprimer </a>

                            </strong>
                        </td>




                    </tr>
                @endforeach
                   <!-- la pagination !-->
           {{$clients->render()}}
                </tbody>

            </table>


        </div>
       <script >
           function getID($id)
           {
               document.getElementById("header").innerHTML ='Confirmation';
               document.getElementById("message").innerHTML = "Voulez-Vous Vraiment Supprimer cet employé ?";
               document.getElementById("footer").innerHTML =
                       '<form method="POST" action="'+$id+'">'+
                       '<input name="_token" type="hidden" value="{{ csrf_token() }}">'+
                       '<input type="hidden" name="_method" value="Delete">'+
                       '<div>'+
                       '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                       '<button type="submit" class="btn btn-primary">Valider</button>'+
                       '</div>'
               '</form>';
           }
       </script>

        <div>
            <p>
                <a class=" btn btn-info pull-right" href="{{ url('/clients/create') }}">Creer un compte client</a>
            </p>
        </div>
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

        function getID($id)
         {

             document.getElementById("header").innerHTML ="Confirmation";
             document.getElementById("message").innerHTML = "Voulez-Vous Vraiment Supprimer ce client ?";
             document.getElementById("footer").innerHTML =

                     '<form method="POST" action="clients/'+$id+'/delete">'+
                     '<input name="_token" type="hidden" value="{{ csrf_token() }}"'+
                     '<div>'+
                     '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                     '<button type="submit" class="btn btn-primary">Valider</button>'+
                     '</div>'+
                    '</form>';



    }

    </script>


@endsection

