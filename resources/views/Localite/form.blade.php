
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<?php
if($localite->localiteID){
  $options=['Method'=>'post', 'url'=> route('localite.update',$localite)];
  $option=method_field('PUT');
  $test=1;
  $type="Modifier";
  }

else {
  $test=2;
$options=['Method'=>'post', 'url'=> route('localite.store')];
$option=method_field('POST');
$type="Ajouter";
}

?>


<div class="col-md-10   col-md-offset-2">
     <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">{{$type}} Une Agence</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
         
      {!! Form::model($localite,$options)  !!}
{!! $option !!}
<div class="container">
   
      <hr>
 <div class="row">
         
          


          <!-- edit form column -->
   <div class="col-md-9 personal-info block">
        

         
      <form class="form-horizontal " role="form">
                

        <div class="row">
             <div class="col-lg-8">
              
                <div class="form-group  block">
                   <div class="row">
                  {!! Form::label('libelleLocalite','libelleLocalite',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                     {!! Form::text('libelleLocalite',null,['class' => 'form-control']) !!}
                     {!! $errors->first('libelleLocalite', '<small class="help-block" style="color:red">:message</small>') !!}
                    </div>
                  </div>
                </div>

                <div class="form-group block">
                  <div class="row">
                  {!! Form::label('numrue','numrue',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                     {!! Form::text('numrue',null,['class' => 'form-control']) !!}
                     {!! $errors->first('numrue', '<small class="help-block" style="color:red">:message</small>') !!}
                    </div>
                  </div>
                </div>

                <div class="form-group block">
                    <div class="row">
                    {!! Form::label('libellerue','libellerue',['class' => 'col-lg-3 control-label block']) !!}
                      <div class="col-lg-8 block">
                     {!! Form::text('libellerue',null,['class' => 'form-control']) !!}
                      </div>
                 </div>
                </div>
                  
                <div class="form-group block">
                  <div class="row">
                    {!! Form::label('codepostale','codepostale',['class' => 'col-lg-3 control-label block']) !!}
                     <div class="col-lg-8 block">
                      {!! Form::text('codepostale',null,['class' => 'form-control']) !!}
                      {!! $errors->first('codepostale', '<small class="help-block" style="color:red">:message</small>') !!}
                    </div>
                  </div>
                </div>

              

                <div class="form-group block "> 
                  @if($test==1)
                  <div class="row">
                    {!! Form::label('ville','ville',['class' => 'col-lg-3 control-label block']) !!}
                      <div class="col-lg-8">
                        <div class="ui-select">
                          <select class="form-control block" name="region" id="region" >
                            <?php
                               $contact = \DB::table('wilaya')->where('wilayaID', $localite->ville)->first();
                            ?>
                                      
                            <option value="{{$contact->wilayaID}}" selected>{{$contact->intitule}}</option>
                             @foreach($wilayas as $wilaya)
                            <option value="{{$wilaya->wilayaID}}" >{{$wilaya->intitule}}</option>
                             @endforeach
                         </select>
                        </div>
                      </div>
                       </div>
                      @else
                      <div class="row">
                      {!! Form::label('ville','ville',['class' => 'col-lg-3 control-label block']) !!}
                      <div class="col-lg-8">
                        <div class="ui-select">
                          <select class="form-control block" name="ville" id="ville" >
                              @foreach($wilayas as $wilaya)
                            <option value="{{$wilaya->wilayaID}}" >{{$wilaya->intitule}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                      @endif
                    </div>
                   
                    <div class="form-group block">
                      <div class="row">
                      <label for="city" class="col-lg-3 control-label block">commune :</label>
                          <div class="col-lg-8">
                             <div class="ui-select">
                                <select  class="form-control" name="commune" id="commune">
                                </select>
                             </div>  
                          </div>
                    </div> 
                  </div>

                    <div class="form-group block">
                      <div class="row">
                      {!! Form::label('pays','pays',['class' => 'col-lg-3 control-label block']) !!}
                         <div class="col-lg-8">
                          {!! Form::text('pays',null,['class' => 'form-control']) !!}
                          {!! $errors->first('pays', '<small class="help-block" style="color:red">:message</small>') !!}
                         </div>
                    </div>     
                  </div>


                    <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                          <button  class="btn btn-primary " >Envoyer</button>
                           <span></span>
                           <input type="reset" class="btn btn-default" value="Annuler">
                        </div>
                    </div>
                    
                      </div> 
                    </div> 
               </form> 
           </div>     
      </div>
</div>
<hr>
{!! Form::close() !!}



<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">

        function SendAjax()
        {

           
          $.ajax({
    url: '/localiteChange/',
    type: 'POST',
    data: {_token: CSRF_TOKEN},
    dataType: 'JSON',
     success :function(response)
    alert("thank u");
});
        }
     


</script>
{!! Html::script('js/jquery-2.1.0.min.js') !!}
<script type="text/javascript" >
$("#region").change(function(event){

  var ville=event.target.value;

  $.get("communes?ville="+ ville, function(res,stat){
    
      $('#commune').empty();
    for(i=0;i<res.length;i++){
      $("#commune").append("<option value="+res[i].ville+">"+res[i].ville+"</option>'");
      

    }
    
  });
});

</script>
<script type="text/javascript" >
$("#ville").change(function(event){

  var ville=event.target.value;

  $.get("localite/communes?ville="+ ville, function(res,stat){
    
      $('#commune').empty();
    for(i=0;i<res.length;i++){
      $("#commune").append("<option value="+res[i].ville+">"+res[i].ville+"</option>'");
      

    }
    
  });
});

</script>
<script type="text/javascript" >

  $("#villdde").change(function(data) {
    
    $.get('ajax-subcat', function(data) {
      for(i=0;i<data.length;i++){
      document.getElementById("commune").innerHTML='<option >rien</option>'
      }
    }); 
    });

</script>
 <script src="js/jquery-2.1.0.min.js"/>
    <script src="js/jquery-1.11.4.min.js"></script>














        





    