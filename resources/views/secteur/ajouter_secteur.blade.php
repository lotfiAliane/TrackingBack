@extends('app')
@section('content')

<?php $x=0; ?>


<div class="col-sm-8 col-sm-offset-2">
     <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Ajouter Un Secteur d'Activité :</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <p style="color:red" > {{$errors->first('lebelle')}} </p>
            <p style="color:red"> {{$errors->first('Wilaya')}} </p>

{!! Form::open(['url' => 'secteur'] ) !!}


<div class="row col-sm-12">
  <div class="col-md-4">{!! Form::label('lebelle1','Lebellé :',['class' => 'col-md-4 control-label block']) !!}</div>
  <div class="col-md-4">{!! Form::text('lebelle',null,['class' => 'form-control', 'id' => 'lebelle' ,'style' => 'margin-bottom: 40px;', 'placeholder'=>'Nom de Secteur ... ']) !!}</div>
</div>

<div class="row col-md-12">
  <div class="col-md-4"> {!! Form::label('wilaya','Wilaya :',['class' => 'col-md-4 cpntrol-labl block','style' => 'margin-bottom: 40px;']) !!}</div>
  <div class="col-md-4">

      <select name='Wilaya' id='Wilaya' class='form-control' onchange='getCommunes(this.value,{{$villes}})'>
          <option value=" "></option>
          @foreach($wilayas as $wilaya)

              <option value={{$wilaya->wilayaID}}> {{$wilaya->wilayaID}} - {{$wilaya->intitule}} </option>

          @endforeach
      </select>
  </div>
</div>

<div class="row col-md-12">
  <div class="col-md-4"> {!! Form::label('communes','Communes:',['class' => 'col-md-4 control-label']) !!}</div>
  <div class="col-md-4" style="overflow:auto; width:340px;height:380px; margin-bottom: 20px; background-color:#eee; border: 1px solid #888; border-radius:3px;" id="communes" > </div>
</div>

<div class="row col-md-12">
  <div class="col-md-offset-4 col-md-4">
                   <a class="btn btn-danger pull-left" href="/secteur">Annuler</a> 
                  {!! Form::submit('Terminer',['class'=>'btn btn-primary pull-right']) !!}
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
        $liste=$liste+"<div class='checkbox'><label><input type='checkbox'  name='name"+$villes[j].villeID+"'>"+$villes[j].ville+"</label></div>";
      }
    }

    document.getElementById("communes").innerHTML=$liste;
  }

</script>

@endsection