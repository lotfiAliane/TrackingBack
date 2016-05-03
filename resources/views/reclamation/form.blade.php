
<?php


if($reclamation->ReclamationID){
  $options=['Method'=>'post', 'url'=> route('reclamation.update',$reclamation)];
  $option=method_field('PUT');
  $type="Modifier";

}

else {
  
$options=['Method'=>'post', 'url'=> route('reclamation.store')];
$option=method_field('POST');
$type="Ajouter";
}


?>

<div class="col-md-10   col-md-offset-2">
     <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">{{$type}} Une réclamation</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
         
      {!! Form::model($reclamation,$options)  !!}
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
                  {!! Form::label('codeBordereau','codeBordereau',['class' => 'col-lg-3 control-label block']) !!}
                   <div class="col-lg-8 block">
                     {!! Form::text('codeBordereau',null,['class' => 'form-control ']) !!}
                     {!! $errors->first('codeBordereau', '<small class="help-block" style="color:red">:message</small>') !!}
                   </div>
                </div>
              </div>

               <div class="form-group block ">
                <div class="row">
                  {!! Form::label('NomClient','Nom Client',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                      {!! Form::text('NomClient',null,['class' => 'form-control ']) !!}
                      {!! $errors->first('prenom', '<small class="help-block" style="color:red">:message</small>') !!}
                    </div>
                </div>
               </div> 
                   

                <div class="form-group block ">
                  <div class="row">
                  {!! Form::label('MotifDappel','Motif dappel',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                      {!! Form::text('MotifDappel',null,['class' => 'form-control ']) !!}
                      {!! $errors->first('MotifDappel', '<small class="help-block" style="color:red">:message</small>') !!}
                    </div>
                </div>
              </div>


                <div class="form-group block">
                  <div class="row">
                  {!! Form::label('Commentaire','Commentaire',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block" >
                         {!! Form::textarea('Commentaire',null,['class' => 'form-control ']) !!}
                    </div>
                </div>
              </div>

                 <div class="form-group block ">
                  <div class="row">
                 {!! Form::label('Statut','Priorité',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8">
                      <div class="ui-select">
                           <select id="Statut" name="Statut" class="form-control block" name="poste">
                               <option value="Haute">Haute</option>
                               <option value='Bas'>Bas</option>
                               <option value="Moyenne">Moyenne</option>
                           </select>
                     </div>
                   </div>
                </div>
              </div>




                   
                <div class="form-group block ">
                  <div class="row">
                  {!! Form::label('date','date',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                         {!! Form::date('date',null,['class' => 'form-control ']) !!}
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


















        





    