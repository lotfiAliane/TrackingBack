
<?php


if($employe->employeID){
  $options=['Method'=>'post', 'url'=> route('employe.update',$employe)];
  $option=method_field('PUT');
$type="Modifier";
}

else {
  
$options=['Method'=>'post', 'url'=> route('employe.store')];
$option=method_field('POST');
$type="Ajouter";
}


?>

<div class="col-md-10   col-md-offset-2">
     <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">{{$type}} Un Employé</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
         
      {!! Form::model($employe,$options)  !!}
{!! $option !!}
<div class="container">
   
      <hr>
        <div class="row">

          <div class="form-group">
    {!! Form::label('Employé image') !!}
    {!! Form::file('image', null) !!}
</div>


          <!-- edit form column -->
      <div class="col-md-9 personal-info block">
        

         
          <form class="form-horizontal " role="form">
                

        <div class="row">
             <div class="col-lg-8">
                <div class="form-group block  ">
                  <div class="row">
                    {!! Form::label('civilite','Civilite',['class' => 'col-lg-3 control-label block']) !!}
                      <div class="col-lg-8 ">
                         <div class="ui-select">
                            <select id="user_time_zone"class="form-control block" name="civilite" >
                               <option value="M"> Melle </option>
                               <option value="Ms">Msr</option>
                               <option value="Md">Mde</option>
                            </select>
                         </div>   
                      </div>
                    </div>
                </div> 
                

                <div class="form-group block ">
                  <div class="row">
                 {!! Form::label('poste','Profil',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8">
                      <div class="ui-select">
                           <select id="user_time_zone" class="form-control block" name="poste">
                               <option value="Administrateur">Administrateur</option>
                               <option value='Superviseur'>Supervisueur</option>
                               <option value="Agent de Terain">Agent de Terain</option>
                           </select>
                     </div>
                   </div>
                  </div>
                </div>



              
                <div class="form-group  block">
                  <div class="row">
                  {!! Form::label('nom','Nom',['class' => 'col-lg-3 control-label block']) !!}
                   <div class="col-lg-8 block">
                     {!! Form::text('nom',null,['class' => 'form-control ']) !!}
                     {!! $errors->first('nom', '<small class="help-block" style="color:red">:message</small>') !!}
                   </div>
                </div>
              </div>

               <div class="form-group block ">
                <div class="row">
                  {!! Form::label('prenom','Prénom',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                      {!! Form::text('prenom',null,['class' => 'form-control ']) !!}
                      {!! $errors->first('prenom', '<small class="help-block" style="color:red">:message</small>') !!}
                    </div>
                </div>
                </div>  

                <div class="form-group block ">
                  <div class="row">
                  {!! Form::label('email','Email',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                      {!! Form::email('email',null,['class' => 'form-control ']) !!}
                      {!! $errors->first('email', '<small class="help-block" style="color:red">:message</small>') !!}
                    </div>
                </div>
              </div>

                <div class="form-group block">
                  <div class="row">
                  {!! Form::label('tel','tel',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block" >
                         {!! Form::number('tel',null,['class' => 'form-control ']) !!}
                    </div>
                </div>
              </div>
                   
                <div class="form-group block ">
                  <div class="row">
                  {!! Form::label('telfix','telfix',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                         {!! Form::number('telfix',null,['class' => 'form-control ']) !!}
                    </div>
                </div>
              </div>
                <div class="form-group block">
                  <div class="row">
                  {!! Form::label('telfax','telfax',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                      {!! Form::number('telfax',null,['class' => 'form-control ']) !!}
                    </div>
                </div>
              </div>

                <div class="form-group block">
                  <div class="row">
                  {!! Form::label('Identifiant','Identifiant',['class' => 'col-md-3 control-label block']) !!}
                    <div class="col-md-8 block">
                        {!! Form::text('Identifiant',null,['class' => 'form-control ']) !!}
                    </div>
                </div>
              </div>
                <div class="form-group block ">
                  <div class="row">
                  {!! Form::label('password','Mot De Passe',['class' => 'col-md-3 control-label block']) !!}
                    <div class="col-lg-8 block ">
                         <input class="form-control" type="password" name="password" id="password" value="">

                    </div>
                </div>
              </div>
                    

                <div class="form-group block">
                  <div class="row">
                  {!! Form::label('localite','Localité',['class' => 'col-lg-3 control-label block']) !!}
                     <div class="col-lg-8">
                          <select class="form-control input-sm block" name="localite" id="localite">
                           @foreach($localites as $localite)
                               <option value="{{$localite->localiteID}}" >{{$localite->libelleLocalite}}</option>
                          @endforeach
                           </select>
                      </div>
                </div>
              </div>

               
                 <div class="form-group block">
                  <div class="row">
                     {!! Form::label('secteur','Secteur',['class' => 'col-lg-3 control-label block']) !!}
                       <div class="col-lg-8">
                        <div class=" col-md-3 block" style="overflow:auto; width:345px;height:80px; margin-bottom: 10px;background-color:#eee; border: 1px solid #eee; border-radius:3px;">
                          
                         <?php     $exist=0;    ?>
                          @foreach($secteurs as $secteur)

                              @foreach($employe_secteur as $sect)
                                @if(($employe->employeID==$sect->employeID) AND ($secteur->secteurID==$sect->secteurID))
                                    <?php $exist=1;   ?>

                                @endif             
                              @endforeach

                              @if($exist==1)
                             <div class='checkbox'><label><input type='checkbox'  name='name{{$secteur->secteurID}}' checked>{{$secteur->lebelle}}</label></div> 
                                <?php $exist=0; ?>
                              @elseif($exist==0)
                              
                                <div class='checkbox'><label><input type='checkbox'  name='name{{$secteur->secteurID}}'>{{$secteur->lebelle}}</label></div>
                              @endif
                          @endforeach
                        </div>
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


















        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    





    