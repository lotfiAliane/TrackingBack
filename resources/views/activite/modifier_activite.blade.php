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


          <div class="col-md-8 col-md-offset-2">
           <div class="box box-primary box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Modifier Une Activité :</h3>
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


          {!! Form::open(['method'=>'PATCH' , 'action' => ['ActiviteController@postModifier',$activiteID]]) !!}

          <div class="row">

                {!! Form::label('lebelle1','Client : *',['class' => 'col-md-4 control-label block']) !!}

                 <div class="col-md-4"> <strong> {{$nom}}  {{$prenom}} </strong> </div>

           </div>

         </br>
         </br>

            <div class="row">

                {!! Form::label('Agence', 'Agence : *',['class' => 'col-md-4 control-label block']) !!}
                <div class="col-md-4 " >

                  <select name='localiteID' id='localiteID' class='form-control select2' onchange='getAgents(this.value,{{$employes}})'>


                      <option value=" ">  Selectionner Une Agence ....  </option>

                           <?php $i=1; ?>
                      @foreach($localites as $localite)

                          @if($localite->localiteID == $activite[0]->localiteID)
                           <option selected value={{$localite->localiteID}} > {{$i}} - {{$localite->libelleLocalite}} </option>
                          @else
                          <option  value={{$localite->localiteID}} > {{$i}} - {{$localite->libelleLocalite}} </option>
                          @endif
                           <?php $i=$i+1; ?>
                      @endforeach


                  </select>

              </div>
           </div>

         </br>
         </br>


            <div class="row">

                {!! Form::label('Agence','Agent : *',['class' => 'col-md-4 control-label block']) !!}
                <div class="col-md-4 " id="Agents">
                  <select name='agent' id='agents' class='form-control select2' onchange='getAgents(this.value,{{$employes}})'>

                           <?php $i=1; ?>
                      @foreach($employes as $employe)

                          @if($employe->localiteID == $activite[0]->localiteID AND $employe->employeID == $activite[0]->employeID )
                            <option selected value={{$localite->localiteID}} > {{$i}} - {{$employe->nom}} {{$employe->prenom}} </option>
                          @elseif($employe->localiteID == $activite[0]->localiteID)
                          <option  value={{$localite->localiteID}} > {{$i}} - {{$employe->nom}} {{$employe->prenom}}  </option>
                          @endif
                           <?php $i=$i+1; ?>
                      @endforeach

                  </select>
                 </div>

           </div>

          </br>
         </br>


            <div class="row">

                {!! Form::label('Statut','Statut : *',['class' => 'col-md-4 control-label block']) !!}
                <div class="col-md-4 " id="statuts">
                  <select name='statut' id='statut' class='form-control select2' onchange='date(this.value)'>

                      @if($activite[0]->statut == 'non active')
                             <option  value='non active' selected > 1 - Non Active  </option>
                      @else

                           @if($activite[0]->statut == 'active')
                             <option  value='active' selected > 1 - Active  </option>
                           @else
                             <option  value='active' > 1 - Active  </option>
                           @endif

                           @if($activite[0]->statut == 'terminé')
                             <option  value='terminé' selected > 2 - Treminé </option>
                           @else
                             <option  value='terminé' > 2 - Treminé   </option>
                            @endif

                            @if($activite[0]->statut == 'pause')
                             <option  value='pause' selected > 3 - Pause  </option>
                           @else
                             <option  value='pause' > 3 - Pause  </option>
                          @endif

                      @endif

                   

                  </select>
                 </div>

           </div>
     
     </br>
     </br>


    <div class="row" id="dateFin">


        @if($activite[0]->statut == 'terminé')

        {!! Form::label('dateFin','Date de Fin : *',['class' => 'col-md-4 control-label block']) !!}

            <input  class='col-md-4' type="datetime-local" value={{$new}}  name="dateFin"  step="1">


        @endif
     
    </div>

      </br>
     </br>

  <div class="row col-md-12">
   <div class="col-md-offset-4 col-md-4">
                  <a class="btn btn-danger pull-left" href="{{ url('/activite') }}">Annuler</a> 
                  {!! Form::submit('Terminer',['class'=>'btn btn-info pull-right']) !!}
   </div> 
</div>

{!! Form::close() !!}

        </div><!-- /.box-body --> 
      </div><!-- /.box -->
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


        if($id==' ')
        {
        $liste2=" <select name='statut' id='statut' class='form-control select2' onchange='date(this.value)'>";
        $liste2=$liste2+" <option  value='non active' selected > 1 - Non Active  </option>";
        $liste2=$liste2+"  </select>";
        document.getElementById("dateFin").innerHTML="";
       }
       else
       {
         $liste2=" <select name='statut' id='statut' class='form-control select2' onchange='date(this.value)'>";
        $liste2=$liste2+" <option  value='active'  selected> 1 - Active  </option>";
        $liste2=$liste2+"  <option  value='terminé' > 2 - Treminé   </option>";
        $liste2=$liste2+"  <option  value='pause' > 3 - Pause  </option>";
        $liste2=$liste2+"  </select>";

       }

         document.getElementById("statuts").innerHTML=$liste2;

  }


  function date($statut)
  {

        $date="<label class=col-md-4 > Date de Fin : *</label>   <input  class='col-md-4' type='datetime-local'  name='dateFin'  step='1'>";
        $liste="";
        $liste2="";
   
        if($statut=='terminé')
        {
          document.getElementById("dateFin").innerHTML=$date;
        }
        else
        {
           document.getElementById("dateFin").innerHTML="";
        }


  }
  

</script>


@endsection