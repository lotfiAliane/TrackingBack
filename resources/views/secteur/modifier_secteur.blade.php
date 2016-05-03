@extends('app')
@section('content')



    <div class="col-md-12 ">
     <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Modifier Un Secteur d'Activité :</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            
            <p style="color:red">{{$errors->first('lebelle')}} </p>
<p style="color:red">{{$errors->first('wilayaSelectionne')}}</p>


{!! Form::open(['method'=>'PATCH' , 'action' => ['SecteurController@postModifier',$secteurID]]) !!}


<div class="row col-md-12">
  <div class="col-md-4">{!! Form::label('lebelle','Lebellé',['class' => 'col-md-4 control-label']) !!}</div>
  <div class="col-md-4">{!! Form::text('lebelle',$secteurs->lebelle,['class' => 'form-control']) !!}</div>
</div>


<div class="row col-md-12">
  <div class="col-md-4"> {!! Form::label('wilaya','Wilaya :',['class' => 'col-md-4 control-label']) !!}</div>
  <div class="col-md-4">

      <select name='Wilaya'  class='form-control select2' onchange='getCommunes(this.value,{{$villes}})'>

          @foreach($wilayas as $wilaya)
                @if($secteurs->WilayaID == $wilaya->wilayaID)
                  <option value={{$wilaya->wilayaID}} selected= true> {{$wilaya->wilayaID}} - {{$wilaya->intitule}} </option>
                @else
                  <option value={{$wilaya->wilayaID}}> {{$wilaya->wilayaID}} - {{$wilaya->intitule}} </option>
                @endif
          @endforeach 
      </select>
  </div>

</div>

<div class="row col-md-12">
   <div class="col-md-4"> {!! Form::label('communes','Communes :',['class' => 'col-md-4 control-label']) !!}</div>

  <div class="col-md-4" style="overflow:auto; width:515px;height:380px; margin-bottom: 20px;" id="communes">

      @foreach($villes as $ville)  
       @if($ville->secteurID == $secteurID AND $ville->wilayaID == $secteurs->WilayaID) 
      
              <div class='checkbox'><label><input type='checkbox'  name='name{{$ville->villeID}}' checked> {{$ville->ville}}</label></div>
            
        @elseif ($ville->wilayaID == $secteurs->WilayaID)
       
              <div class='checkbox'><label><input type='checkbox'  name='name{{$ville->villeID}}'> {{$ville->ville}}</label></div>

         @endif
      @endforeach
</div>

</div>

<div class="row col-md-12">
   <div class="col-md-offset-4 col-md-4">
                  <a class="btn btn-danger pull-left" href="/secteur">Annuler</a> 
                  {!! Form::submit('Terminer',['class'=>'btn btn-info pull-right']) !!}
   </div> 
</div>

{!! Form::close() !!}


        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>








<script type="text/javascript">
        
   function getCommunes($idWilaya,$villes)
   {     
      $liste="";

      for(var j=0 in $villes)
      {       

        if($villes[j].wilayaID == $idWilaya)
        {
          $liste=$liste+" <td class='text-primary'>  <div class='checkbox'><label><input type='checkbox'  name='name"+$villes[j].villeID+"'>"+$villes[j].ville+"</label></div>  </td>  </tr>";
        }
      }

      document.getElementById("communes").innerHTML=$liste;
    }

</script>

@endsection