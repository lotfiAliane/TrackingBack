@extends('app')

@section('content')

         <section class="content-header">
                    <h1>
                    Gestion des Activités des Agents
                    <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
            </section>
          </br>
          </br>


<div class="col-md-8  col-md-offset-2">
{!! Form::open(['method'=>'POST'  , 'action' => ['ActiviteController@postAffectation',$id]])  !!}

<div class="box box-primary box-solid">
  <div class="box-header with-border">
    <h3 class="box-title"> 

      <div class="col-md-12" id="t3">Affectaion Activité :</div>
     
    </h3>
  </div><!-- /.box-header -->
  <div class="box-body">

   @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!! </strong> Vérifier les informations.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

    </br>  </br> 

    <div class="row col-md-12">
      
      <center>

      {!! Form::label('Agence','Agence : *',['class' => 'col-md-4 control-label block']) !!}
        <div class="col-md-4 " >
     
             <select name='Agence' id='localiteID' class='form-control select2' onchange='getAgents(this.value,{{$employes}})'>

                <option value="">Selectionner Une Agence ... </option>

                <?php $i=1; ?>
                @foreach($localites as $localite)
                  <option value={{$localite->localiteID}}> {{$i}} - {{$localite->libelleLocalite}} </option>
                  <?php $i=$i+1; ?>
                @endforeach

            </select>

        </div>

  </br>  </br> </br>  </br>  </br>  </br>


   {!! Form::label('Agent','Agent : *',['class' => 'col-md-4 control-label block']) !!}
      <div class="col-md-4" id="Agents">

            
             <select name='agent' id='agents' class='form-control select2'>

             </select>


      </div>
      </center>

    </div>

  </br>  </br>  </br>  </br> </br>  </br>  </br>  </br> </br>    </br>  </br> </br>  </br> 

    <div class="row col-md-12">
   <div class="col-md-offset-4 col-md-4">
       <a class="btn btn-danger pull-left" href="/activite">Annuler</a> 
       {!! Form::submit('Valider',['class'=>'btn btn-info pull-right']) !!}
   </div> 
  </div>

    {!! Form::close() !!}


  </div>
</div>


<script type="text/javascript">

  function getAgents($id,$employes)
  {
       $liste="<select name='agent' id='agents' class='form-control select2'>";

       $n=1;

       for(var j=0 in $employes)
        { 
          if($employes[j].localiteID == $id)
          {       
              $liste=$liste+"<option value="+$employes[j].employeID+"> "+$n+" - "+$employes[j].nom+"  "+$employes[j].prenom+" </option>";  
              $n=$n+1;
          }
        }
        
        document.getElementById("Agents").innerHTML=$liste;
  }

</script>

@endsection