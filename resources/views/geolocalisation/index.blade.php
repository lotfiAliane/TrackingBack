@extends('app')
@section('content')

 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCAbw7e2hVW-Tk4KRbdwZrj9GEBl9wnqBM"></script>
 
        <script>
            // 6. mendefinikan kota
            

   var overlayCoordinates =[
	@foreach ($collection as $coordinate)
		new google.maps.LatLng({!! $coordinate['latitude'] !!}, {!! $coordinate['longitude'] !!}),
	@endforeach
];
    
    
            // 2. menambahkan properti peta
            function initialize() {
                var properti_peta = {

                    center: new google.maps.LatLng({!! $coordone['latitude']!!},{!!$coordone['longitude']!!}),
                    zoom:8,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                // 4. membuat object peta
                var peta = new google.maps.Map(document.getElementById("tempat_peta"), properti_peta);
 					@foreach ($collection as $coordinate)
 				var marker=	new google.maps.Marker({
		position: new google.maps.LatLng({!! $coordinate['latitude'] !!}, {!! $coordinate['longitude'] !!}),

	});    

                
               
              <?php
                 $tz = new DateTimeZone('Africa/Algiers');
                $date = new DateTime('now', $tz);
                $lancement  = new DateTime($coordinate->updated_at);
                $d=$date->diff($lancement)->format('localisé il y a : %M mois');
                $color="red";
                if ($d =="localisé il y a : 00 mois"){
                    
                     $d=$date->diff($lancement)->format('localisé il y a : %D jours');
                     if ($d == "localisé il y a : 00 jours"){
                     
                        $d=$date->diff($lancement)->format('localisé il y a : %H Heurs');
                        if ($d=="localisé il y a : 00 Heurs"){

                            $d=$date->diff($lancement)->format('localisé il y a : %i minute');  
                            $color="green";

                        }
                     }  
                     
                }



              ?>     
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/{!!$color!!}-dot.png');
 				marker.setMap(peta);

             @if (count($coordinate->employe) != 0){
 				var informasi = new google.maps.InfoWindow({
                    content: "{!!$coordinate->employe->nom!!} {!!$d!!} "
                });
 
                informasi.open(peta, marker);
              }
              @endif
	@endforeach

                // 7. menambahkan marker
               
            }
               function changement($latitude,$longitude,$contenue){
var properti_peta = {

                    center: new google.maps.LatLng($latitude,$longitude),
                    zoom:8,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                    var marker= new google.maps.Marker({
        position: new google.maps.LatLng($latitude,$longitude),

    });    
                    var peta = new google.maps.Map(document.getElementById("tempat_peta"), properti_peta);
                
    marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
                marker.setMap(peta);
                
                var informasi = new google.maps.InfoWindow({
                    content: 'localisé pour la derniere fois le  '+$contenue
                });
 
                informasi.open(peta, marker);

            
    }
 
 
            // 5. menampilkan peta
            google.maps.event.addDomListener(window, 'load', initialize);
 
        </script>


           <div class="box box-primary box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Geolocalisation d'agents </h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="row">
        {!! Form::label('Employe','Localiser',['class' => 'col-md-2 control-label block ']) !!}
                      <div class="col-lg-4">
                       
                          <select class="form-control block" name="employe" id="employe" >
                             <option value="all" >tout mes employés</option>
                              @foreach($employes as $employe)
                            <option value="{{$employe->employeID}}" >{{$employe->nom}}</option>
                              @endforeach
                          </select>
                       
                      </div>

                      </div>
                      <br/>
              <div class="embed-responsive embed-responsive-16by9">

    <div id="tempat_peta" class="embed-responsive-item" style="border: 1px solid black"></div>
</div>
                  </div>
              </div>
   
<script type="text/javascript" >

$("#employe").change(function(event){


  var ville=event.target.value;
  if(ville=="all"){
    initialize();
  }

  $.get("localisation?employe="+ville, function(res,stat){
    
      
    changement(res[0].latitude,res[0].longitude,res[0].updated_at);
  });
});
</script>

@stop
