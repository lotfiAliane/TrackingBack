@extends('app')

@section('content')


<div class="container">
            @if (Session::has('message'))
                <div class="alert alert-info" role="alert">

                    <p class="text-primary">{{ Session::get('message') }}</p>
                </div>
            @endif

           
        </div>

<div class="col-sx-12 ">
     <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Preuve de livraison</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

        {!! Form::open(['url'=>'email']) !!}

        <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-9 personal-info block">
                    <form class="form-horizontal " role="form">


                        <div class="col-lg-20">
                            <div class="form-group block  ">
                                <div class="row">
                                    {!! Form::label('CodeBordereau','CodeBordereau',['class' => 'col-lg-3 control-label block']) !!}
                                    <div class="col-lg-6 ">

                                	<input type="text" name="codeBordereau" id="codeBordereau" class="form-control" ></input>
                                    </div>
                                    <div class="col-lg-2 ">
                                    		
                                	<input type="button"  name="button" id="button" class="form-control"  value="valider"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  block">
                                <div class="row">
                                {!! Form::label('nom','Nom',['class' => 'col-lg-3 control-label block']) !!}


                                <div class="col-lg-8 block">
                                    <input type="text" name="nom" id="nom" class="form-control" readonly></input>
                                    {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                                </div>
                                    </div>
                            </div>
                            <div class="form-group block ">
                                <div class="row">
                                {!! Form::label('prenom','Prénom',['class' => 'col-lg-3 control-label block']) !!}


                                <div class="col-lg-8 block">
                                    
                                	<input type="text" name="prenom" id="prenom" class="form-control" readonly></input>
                                	{!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
                                </div>
                                    </div>
                            </div>

                            <div class="form-group block ">
                                <div class="row">
                                {!! Form::label('email','Email',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    {!! Form::email('email',null,['class' => 'form-control ']) !!}
                                    {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                                </div>
                                    </div>
                            </div>
                            <div class="form-group block ">
                                <div class="row">
                                {!! Form::label('Image','Chemin',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    <input type="text" name="raisonSociale" id="raisonSociale" class="form-control" readonly></input>

                                </div>

                            <div class="form-group block ">
					{!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
				{!! Form::close() !!}

</div>
                                    </div>
                            </div>

<script type="text/javascript" >
function client($id){
 $.get("clientpreuve?DesinataireID="+$id, function(res,stat){

$("#nom").val(res[0].nom);
$("#prenom").val(res[0].prenom);
$("#email").val(res[0].email);

});
}

function imaage($code){
	
$.get("imagepreuve?code="+$code, function(res,stat){
	
$("#raisonSociale").val(res[0].chemin);
	});
}

$("#button").click(function(event){
 var hu = document.getElementById("codeBordereau").value; 



imaage(hu);
  $.get("preuvve?code="+hu, function(res,stat){


client(res[0].distinataireID);
  
	    
      
  });
});
</script>


@stop