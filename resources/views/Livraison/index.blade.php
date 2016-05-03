@extends('app')
@section('content')




        <!-- LA BARE DE RECHECRHE !-->
          
    <div class="form-group" >
      <div class="icon-addon addon-lg">
  {{ Form::open(array('url' => 'searchSuivi', 'method' => 'POST', 'class' => 'form navbar-form navbar-right searchform')) }}
      
  <select class="form-control" id="par" name="par">
    
  <option value="codeBordereau"> N°Colis</option>
  </select>
      {!! Form::text('find', null,
                           array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Rechercher...')) !!}
     {!! Form::submit('Rechercher',
                                array('class'=>'btn btn-default')) !!}
                    {{ Form::close() }} 
    </div>
    </div  >

<br>  </br>


            <!-- fin BARRE DE RECHERCHE !-->

       <!-- include la popup  !-->
		 @include('employe.modal_confirm')
      
		    <div class="panel panel-primary">
			   <div class="panel-heading">
				<h3 class="panel-title">Suivi de livraison</h3>

			</div>

			<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>N°Colis</th>
						<th>Nom client</th>
						<th>Suivi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($suiviactifs as $suiviactif)
						<tr>
							<td class="text-primary">
								<strong> {!!$suiviactif->codeBordereau!!}</strong>	
							</td>
							<!--000express100-->
           
							<td class="text-primary">

								
                                @foreach($actifs as $actif)

                                	@if($actif->codeProduit == $suiviactif->codeBordereau)
                                	
                                		@foreach($commandes as $commande)
                               		
                               				@if($commande->commandeID == $actif->commandeID)  

                               					 @foreach($clients as $client)

                               						 @if($client->clientID == $commande->clientID)
                               							 			<strong> {!!$client->nom!!} {!!$client->prenom!!}</strong>
                               						 @endif

                                				 @endforeach
                                				 
                               				@endif
                              			 @endforeach
                              		
                               		 @endif

                                @endforeach
                              
                            </td>    	        

                             
		
						 
							

   
  <!-- le boutton suivre !-->           
		              <td class="text-primary">
						  <strong> 
		                     <a class='btn btn-primary'  data-toggle="modal" data-target="#myModal" onclick="getAdress({{$suiviactifadress}},'{{$suiviactif->codeBordereau}}')">
		                        <i class='fa-list-ul'></i> Suivre
		                     </a>
		                 </strong>	
					 </td>
  

							
	
						</tr>

			 @endforeach
  <!-- la pagination !-->
					 <?php echo $suiviactifs->render(); ?>
       
				</tbody>

			</table>	

		</div>
 

 <!-- le script de la popup de la liste des adresses !-->
		    

  <script type="text/javascript">

  function getAdress($liste,$id)
  {


  	$listeAD="";

  	for(var i=0 in $liste)
  	{
  		if($liste[i].codeBordereau == $id)
  		{
  			if($liste[i].type == 'type')
  			{
  				$listeAD=$listeAD+"<strong> ASSMAHALNA MAZALE MABDINACHE ELKHADMA </strong> </br>";
  			}

  			if($liste[i].type == 'enlevementClient')
  			{
  				$listeAD=$listeAD+"<strong> Enlevement Client </strong> </br><div class='col-xs-9'>"+$liste[i].adresse+" </div>  "+$liste[i].date+"</br>";
  			}
  			
  			if($liste[i].type == 'receptionAgence')
  			{
  				$listeAD=$listeAD+"<strong> Recéption Agence </strong> </br><div class='col-xs-9'> "+$liste[i].adresse+"</div> "+$liste[i].date+"</br>";
  			}

  			if($liste[i].type == 'Prelevement Agence')
  			{
  				$listeAD=$listeAD+"<strong> Prélevement Agence </strong> </br><div class='col-xs-9'>"+$liste[i].adresse+" </div>  "+$liste[i].date+"</br>";
  			}

  			if($liste[i].type == 'LivraisonClient')
  			{
  				$listeAD=$listeAD+"<strong> Livraison Client </strong> </br><div class='col-xs-9'>"+$liste[i].adresse+"  </div> "+$liste[i].date+"</br>";
  			}


  		}
  	}


  	 document.getElementById("header").innerHTML = "N° Colis :  "+$id;

  	 document.getElementById("message").innerHTML = $listeAD;


  	 document.getElementById("footer").innerHTML = '<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>';

  }


  </script>    
                

  


@stop