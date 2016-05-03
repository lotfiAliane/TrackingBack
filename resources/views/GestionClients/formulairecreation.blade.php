@extends('app')
@section('content')

<div class="col-sx-12 ">
     <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Ajouter Un Employé</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

        {!! Form::open(['url'=>'clients']) !!}

        <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-9 personal-info block">
                    <form class="form-horizontal " role="form">


                        <div class="col-lg-8">
                            <div class="form-group block  ">
                                <div class="row">
                                    {!! Form::label('civilite','Civilite',['class' => 'col-lg-3 control-label block']) !!}
                                    <div class="col-lg-8 ">

                                        {!!  Form::select('civilite', array(' ' => 'Sélectionner', 'M.' => 'M.','Mme'=>'Mme','Mlle'=>'Mlle'), null, array('class'=>'form-control','style'=>'' )) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  block">
                                <div class="row">
                                {!! Form::label('nom','Nom',['class' => 'col-lg-3 control-label block']) !!}


                                <div class="col-lg-8 block">
                                    {!! Form::text('nom',null,['class' => 'form-control ']) !!}

                                </div>
                                    </div>
                            </div>
                            <div class="form-group block ">
                                <div class="row">
                                {!! Form::label('prenom','Prénom',['class' => 'col-lg-3 control-label block']) !!}


                                <div class="col-lg-8 block">
                                    {!! Form::text('prenom',null,['class' => 'form-control ']) !!}
                                </div>
                                    </div>
                            </div>

                            <div class="form-group block ">
                                <div class="row">
                                {!! Form::label('email','Email',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    {!! Form::email('email',null,['class' => 'form-control ']) !!}

                                </div>
                                    </div>
                            </div>
                            <div class="form-group block ">
                                <div class="row">
                                {!! Form::label('raisonSociale','Raison sociale',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    {!! Form::text('raisonSociale',null,['class' => 'form-control ']) !!}

                                </div>
                                    </div>
                            </div>
                            <div class="form-group block">
                                <div class="row">
                                {!! Form::label('telMobile','Mobile',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block" >
                                    {!! Form::text('telMobile',null,['class' => 'form-control ']) !!}
                                </div>
                            </div>
                                </div>
                            <div class="form-group block ">
                                <div class="row">
                                {!! Form::label('telfix','Telephone fixe',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    {!! Form::text('telFix',null,['class' => 'form-control ']) !!}
                                </div>
                                   </div>
                            </div>
                            <div class="form-group block">
                                <div class="row">
                                {!! Form::label('telfax','Fax',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    {!! Form::text('telFax',null,['class' => 'form-control ']) !!}
                                </div>
                                    </div>
                            </div>
                            <div class="form-group block">
                                <div class="row">
                                {!! Form::label('numFiscal','numero fiscale',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    {!! Form::text('numFiscal',null,['class' => 'form-control ']) !!}
                                </div>
                                   </div>
                            </div>
                            <div class="form-group block">
                                <div class="row">
                                {!! Form::label('numRegistreCommerce','registre commerce',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    {!! Form::text('numRegistreCommerce',null,['class' => 'form-control ']) !!}
                                </div>
                                    </div>
                            </div>
                            <div class="form-group block">
                                <div class="row">
                                {!! Form::label('numFiscal','num fiscale',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    {!! Form::text('numFiscal',null,['class' => 'form-control ']) !!}
                                </div>
                                    </div>
                            </div>
                            <div class="form-group block">
                                <div class="row">
                                {!! Form::label('siteWeb','Site Web',['class' => 'col-lg-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    {!! Form::text('siteWeb',null,['class' => 'form-control ']) !!}
                                </div>
                                    </div>
                            </div>
                            <div class="form-group block">
                                <div class="row">
                                {!! Form::label('identifiant','Identifiant',['class' => 'col-md-3 control-label block']) !!}
                                <div class="col-lg-8 block">
                                    {!! Form::text('identifiant',null,['class' => 'form-control ']) !!}
                                </div>

                                    </div>
                            </div>
                            <div class="form-group block">

                                    <div class="form-group block ">
                                        <div class="row">
                                        {!! Form::label('motDePasse','Mot De Passe',['class' => 'col-md-3 control-label block']) !!}
                                        <div class="col-lg-8 block ">
                                            {!! Form::password('motDePasse',  null , ['class'=>'form-control']) !!}

                                        </div>
                            </div>
                            </div>

                             </div>
                            <div class="form-group block">
                                <div class="row">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    {!! Form::submit('Ajouter',['class'=>'btn btn-primary pull-right block ']) !!}
                                    <span></span>
                                    <input type="reset" class="btn btn-default" value="Cancel">
                                </div>
                                    </div>
                            </div>
                            </div>




                        </div>



                    </form>
                </div>
            @if($errors->any())

                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            </div>
            </hr>
        </div>

@stop