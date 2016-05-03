<div class="row">
  <div class="col-lg-10 col-md-9">
    <!--                        <div class="col-lg-1"><img src="img/ajout_contact.png" alt=""></div>-->
    <h1 class="titre-contact">Ajout d'un contact</h1>
  </div>
  
</div>
</div>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="tableaudebord">
        <div class="contact_container">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <h2>Ajouter un contact</h2>
              <p>Lorem ipsum dolor amet Lorem ipsum dolor amet Lorem ipsum dolor amet </p>
              <div class="nb_com" style="display:none">9</div>
            </div>
          </div>
        </div>

        <div class='container'>
          <div class='row'>


            <form class="form-horizontal" role="form">
              <div class='row'>
                <div class="col-lg-12">
                  <div class="titleprghp">
                    <span class="prg">Information contact</span>
                  </div>
                </div>
              </div>
              <div class='row'>

                <div class="col-lg-6">
                  <!--<form class="form-horizontal" role="form">-->
                  <div class="form-group block  ">
                    {!! Form::label('civilite','Civilite:',['class' => 'col-lg-3 control-label block']) !!}
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
                

                <div class="form-group block ">
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



              
                <div class="form-group  block">
                  {!! Form::label('nom','Nom',['class' => 'col-lg-3 control-label block']) !!}
                   <div class="col-lg-8 block">
                     {!! Form::text('nom',null,['class' => 'form-control ']) !!}
                     {!! $errors->first('nom', '<small class="help-block" style="color:red">:message</small>') !!}
                   </div>
                </div>

               <div class="form-group block ">
                  {!! Form::label('prenom','Prénom',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                      {!! Form::text('prenom',null,['class' => 'form-control ']) !!}
                      {!! $errors->first('prenom', '<small class="help-block" style="color:red">:message</small>') !!}
                    </div>
                </div>
                   

                <div class="form-group block ">
                  {!! Form::label('email','Email',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                      {!! Form::email('email',null,['class' => 'form-control ']) !!}
                      {!! $errors->first('email', '<small class="help-block" style="color:red">:message</small>') !!}
                    </div>
                </div>


                <div class="form-group block">
                  {!! Form::label('tel','tel',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block" >
                         {!! Form::number('tel',null,['class' => 'form-control ']) !!}
                    </div>
                </div>

                   
                <div class="form-group block ">
                  {!! Form::label('telfix','telfix',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                         {!! Form::number('telfix',null,['class' => 'form-control ']) !!}
                    </div>
                </div>

                <div class="form-group block">
                  {!! Form::label('telfax','telfax',['class' => 'col-lg-3 control-label block']) !!}
                    <div class="col-lg-8 block">
                      {!! Form::number('telfax',null,['class' => 'form-control ']) !!}
                    </div>
                </div>


                <div class="form-group block">
                  {!! Form::label('Identifiant','Identifiant',['class' => 'col-md-3 control-label block']) !!}
                    <div class="col-md-8 block">
                        {!! Form::text('Identifiant',null,['class' => 'form-control ']) !!}
                    </div>
                </div>

                <div class="form-group block ">
                  {!! Form::label('password','Mot De Passe',['class' => 'col-md-3 control-label block']) !!}
                    <div class="col-lg-8 block ">
                         <input class="form-control" type="password" name="password" id="password" value="">

                    </div>
                </div>
                    

                <div class="form-group block">
                  {!! Form::label('localite','Localité',['class' => 'col-lg-3 control-label block']) !!}
                     <div class="col-lg-8">
                          <select class="form-control input-sm block" name="localite" id="localite">
                           @foreach($localites as $localite)
                               <option value="{{$localite->localiteID}}" >{{$localite->libelleLocalite}}</option>
                          @endforeach
                           </select>
                      </div>
                </div>


                <div class="form-group block">
                 {!! Form::label('secteur','Secteur',['class' => 'col-lg-3 control-label block']) !!}
                   <div class="col-lg-8 ">
                      <div class="col-md-4 block" style="overflow:auto; width:540px;height:80px; margin-bottom: 20px;">
                         @foreach($employe->secteur as $sect)
                           <div class='checkbox'>
                                 <label><input type='checkbox'  name='name{{$sect->secteurID}}' checked>{{$sect->lebelle}}</label>
                           </div>           
                         @endforeach
                         @foreach($secteurs as $secteur)
                           <div class='checkbox'>
                              <label><input type='checkbox'  name='name{{$secteur->secteurID}}'>{{$secteur->lebelle}}</label>
                           </div>
                         @endforeach
                      </div>
                   </div>
                </div>
                    

                    <!--<div class="form-group">
                     {!! Form::label('secteur','secteur',['class' => 'col-md-4 control-label']) !!}
                       <div class="col-md-6">
                          <div class="col-md-4" style="overflow:auto; width:540px;height:80px; margin-bottom: 20px;">
                          @foreach($secteurs as $secteur)

                              @foreach($employe->secteur as $sect)
                                  <div class='checkbox'><label><input type='checkbox'  name='name{{$sect->secteurID}}' checked>{{$sect->lebelle}}</label></div>           
                              @endforeach
                           
                              <div class='checkbox'><label><input type='checkbox'  name='name{{$secteur->secteurID}}'>{{$secteur->lebelle}}</label></div>
                            @endforeach
                          </div>
                        </div>
                    </div>-->



                    <div class="form-group block">
                       <label class="col-md-3 control-label"></label>
                       <div class="col-md-8">
                         <button class="btn btn-primary pull-right block ">Envoyer</button>
                          <span></span>
                         <input type="reset" class="btn btn-default" value="Cancel">
                       </div>
                    </div>
                    
                  <!--</form>-->
                </div>


              </div>

             
          </div>


          <div class="row">
            <div class="col-lg-12">
              <div class="boutton">
                <div class="col-lg-7 col-md-7 hidden-md hidden-xs"></div>
                <div class="col-lg-1 col-md-1 col-xs-12">
                  <button name="submit" id="cancel" type="reset" value="reset" class="btn btn-default">Cancel<span class="glyphicon glyphicon-remove"></span></button>
                </div>
                <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-xs-12">
                  <button name="submit" id="submit" type="submit" value="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span>Enregistrer la fiche contact<span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>