@extends('app')
@section('content')



<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{$employes->count()}}</h3>
                <p>Employé(s)</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('/employe')}}" class="small-box-footer">plus d'information <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$activite->count()}}</sup></h3>
                <p>Activité du jour</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/activiteDuJour') }}" class="small-box-footer">plus d'information <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{$activiteNonAffecte->count()}}</h3>
                <p>Activité non affectée</p>
            </div>
            <div class="icon">

                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/activiteNonAffecte') }}" class="small-box-footer">plus d'information <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$activiteNonAcheve->count()}}</h3>
                <p>Activité non traitée </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            
            <a href="{{ url('/activiteNonTraite') }}" class="small-box-footer">plus d'information<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{$activiteTraite->count()}}</h3>
                <p>Activité Traitée</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            
            <a href="{{ url('/activiteTraite') }}" class="small-box-footer">plus d'information<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
</div>
    @endsection