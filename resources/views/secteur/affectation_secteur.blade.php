@extends('app')

@section('content')



{!! Form::open(['method'=>'POST'  , 'action' => ['SecteurController@postAffectation',$secteur->secteurID]])  !!}

<div class="box box-primary box-solid">
  <div class="box-header with-border">
    <h3 class="box-title"> 

      <div class="col-md-12" id="t3">Affectaion des agents au secteur : <strong >{{$secteur->lebelle}}</strong> :</div>
     
    </h3>
  </div><!-- /.box-header -->
  <div class="box-body">

   

    <div class="row col-md-12">
      <center>
      
        <div class="col-md-4 col-md-offset-4" >

          
             <select name='localiteID' id='localiteID' class='form-control select2' onchange='getAgents(this.value,{{$employes}})'>


                 <option value="0">  Selectionner Une Agence ....  </option>

                 <?php $i=1; ?>
                @foreach($localites as $localite)
                    <option value={{$localite->localiteID}}> {{$i}} - {{$localite->libelleLocalite}} </option>
                    <?php $i=$i+1; ?>
                @endforeach

            </select>

        </div>
      </center>
    </div>

    </br>
     </br>
      </br>

    <div class="row col-md-12">
    <!-- GAUCHE -->
    <div class="col-md-4 ">
     <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Liste des agents de l'agence</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
         <div  id="liste_out" style="overflow:auto; width:550px;height:380px; margin-bottom: 20px;"> </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>


    <!-- CENTRE -->



     <div class="col-md-4">
      </br></br>
        </br></br>
        <center> 
          <div class="row">
            <div class="col-md-offset-2 col-md-8" > <a  class="btn  btn-success btn-lg btn-block"  onclick='sendin({{$employes}})'> Affecter au secteur <i class="glyphicon glyphicon-arrow-right"></i> <i class="glyphicon glyphicon-arrow-right"></i> </a></div> 
          </div>
        </br></br>
        </br></br>
          <div class="row">
           <div class=" col-md-offset-2 col-md-8" >  <a  class="btn btn-danger btn-lg btn-block"  onclick='sendout({{$employes}})'> <i class="glyphicon glyphicon-arrow-left"></i> <i class="glyphicon glyphicon-arrow-left"></i>  Retirer du secteur </a></div> 
          </div>
        </center>
        </br></br>
        </br></br>
      </div>



    <!-- DROITE -->

    <div class="col-md-4">
       <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Liste des agents de secteur</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-12" id="liste_in" style="overflow:auto; width:550px;height:380px; margin-bottom: 20px;">


            @foreach($employe_secteur as $emp_sec)

              @if($emp_sec->secteurID == $secteur->secteurID)

                  @foreach($employes as $employe)

                      @if($emp_sec->employeID == $employe->employeID)

                             <div class='checkbox'><label><input type='checkbox' value='{{$employe->employeID}}' name='names{{$employe->employeID}}}' onclick='addsendout({{$employe->employeID}})' id='emp_out{{$employe->employeID}}'> {{$employe->nom}}  {{$employe->prenom}} </label></div>                     
                              
                             <script type="text/javascript"> list_agent_in_secteur({{$employe->employeID}}); </script>

                      @endif

                   @endforeach

              @endif

           @endforeach

           </div>

        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div>

    </div>



    <div id="t">  

      @foreach($employe_secteur as $emp_sec)

              @if($emp_sec->secteurID == $secteur->secteurID)

                  @foreach($employes as $employe)

                      @if($emp_sec->employeID == $employe->employeID)

                             <div class='checkbox'><label><input type='checkbox' checked style="display:none;" value='{{$employe->employeID}}' name='add{{$employe->employeID}}'></label></div>                     
            
                      @endif

                   @endforeach

              @endif

           @endforeach

     </div>


    <div class="row">
      <center>
     
                   <a class="btn btn-danger btn-lg  " href="/secteur">Annuler</a>                  
                                <!--<a class="btn btn-info pull-right" href="#">Terminer</a>-->
     
                       {!! Form::submit('Valider',['class'=>'btn btn-info btn-lg']) !!}


       </center>
    </div>


     <p id="first" > 



    </p>    

    {!! Form::close() !!}





  </div>
</div>
<p id="debug"> lotfi65656148741541211541111111111111154154 </p>
<script type="text/javascript">


  

  function getAgents($id,$employes)
  {
       $liste="";

       liste_in = [];

       for(var j=0 in $employes)
        { 
          if($employes[j].localiteID == $id)
          {       
              $liste=$liste+"<div class='checkbox'><label><input type='checkbox' value="+$employes[j].employeID+" name='name"+$employes[j].employeID+"'  onclick='addsendin("+$employes[j].employeID+")' id='emp_in"+$employes[j].employeID+"' >"+$employes[j].nom+"  "+$employes[j].prenom+"</label></div>";  
          }
        }
        
        document.getElementById("liste_out").innerHTML=$liste;
         document.getElementById("debug").innerHTML=liste_global_in.length;
   }



   function addsendout($id)
  {

     $ts="emp_out"+$id;

         $liste="";
         if (document.getElementById($ts).checked)
         {
            liste_out.push(document.getElementById($ts).value);
    
         } 
        else
        {

           var i=liste_out.indexOf(document.getElementById($ts).value);
           liste_in.splice(i,1);
        }
      
   }




   function addsendin($id)
   {
         $ts="emp_in"+$id;

         $liste="";


         if ( (document.getElementById($ts).checked))
         {
            liste_in.push(document.getElementById($ts).value);
    
         } 
        else
        {
           var i=liste_in.indexOf(document.getElementById($ts).value);
           liste_in.splice(i,1);
        }

       
       
    }


    function sendin($employes)
    {
      $liste="";

      $problem="";

      $liste_heddin="";

      $existe=0;

      $ii=0;



      for(var o in liste_in)
      {
          for(var j in liste_global_in)
          {
            if(liste_global_in[j] == liste_in[o])
            { 
              $existe=1;
            }
          }
          if($existe==0)
          {
            liste_global_in.push(liste_in[o]);
          }
          else
          {
            $existe=0;
          }
      }

   
      for(var j=0 in $employes)
      {
          for(var i in liste_global_in)
          {
              if(liste_global_in[i]==$employes[j].employeID)
              {
                    $liste=$liste+"<div class='checkbox'><label><input type='checkbox' value="+$employes[j].employeID+" name='names"+$employes[j].employeID+"' onclick='addsendout("+$employes[j].employeID+")' id='emp_out"+$employes[j].employeID+"'> "+$employes[j].nom+"  "+$employes[j].prenom+" </label></div>";
                    $liste_heddin=$liste_heddin+"<div class='checkbox'><label><input type='checkbox' style='display:none;' value="+$employes[j].employeID+" name='add"+$employes[j].employeID+"' id='emp"+$employes[j].employeID+"' checked ></label></div>";
              }
          }
      }   
      document.getElementById("liste_in").innerHTML=$liste;
      document.getElementById("t").innerHTML=$liste_heddin;

      
    }


    function sendout($employes)
    {
      $liste="";
      $liste_heddin="";
      var s=-1;


      for(var o in liste_out)
      {
          for(var j in liste_global_in)
          {
            if(liste_global_in[j] == liste_out[o])
            { 
              s=j;
              $liste2=j;
            }
          }

          if(s>-1)
          {
              liste_global_in.splice(s,1);

          }
          else
          {
            s=-1;
          } 
      }

   
       for(var j=0 in $employes)
      {
          for(var i in liste_global_in)
          {
              if(liste_global_in[i]==$employes[j].employeID)
              {
                    $liste=$liste+"<div class='checkbox'><label><input  type='checkbox' value="+$employes[j].employeID+" name='names"+$employes[j].employeID+"' onclick='addsendout("+$employes[j].employeID+")' id='emp_out"+$employes[j].employeID+"'> "+$employes[j].nom+"  "+$employes[j].prenom+" </label></div>";
                    $liste_heddin=$liste_heddin+"<div class='checkbox'><label><input type='checkbox' style='display:none;' value="+$employes[j].employeID+" name='add"+$employes[j].employeID+"' id='emp"+$employes[j].employeID+"' checked ></label></div>";

              }
          }
      }   

      liste_out = [];

      document.getElementById("liste_in").innerHTML=$liste;

      document.getElementById("t").innerHTML=$liste_heddin;
      
    }




</script>

@endsection