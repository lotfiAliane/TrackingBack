<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{Session::get('employeNom') }} {{Session::get('employePrenom') }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>En ligne</a>
            </div>
        </div>
       <?php
       if(Session::get('SemployePoste') =="Administrateur"){
       ?>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>gestion des employés</span>
                
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/employe') }}"><i class="fa fa-circle-o"></i> Accueil</a></li>
                    <li><a href="{{route('employe.create')}}"><i class="fa fa-circle-o"></i> Ajouter un employé</a></li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>gestion des clients</span>
               
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/clients') }}"><i class="fa fa-circle-o"></i> Accueil</a></li>
                    <li><a href="{{ url('/clients/create') }}"><i class="fa fa-circle-o"></i> Ajouter un client</a></li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>gestion des localités</span>
                
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/localite') }}"><i class="fa fa-circle-o"></i> Accueil</a></li>
                    <li><a href="{{ route('localite.create') }}"><i class="fa fa-circle-o"></i> Ajouter une localité</a></li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>gestion des secteurs d'activités</span>
                
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/secteur') }}"><i class="fa fa-circle-o"></i> Accueil</a></li>
                    <li><a href="{{ url('secteur/ajouter') }}"><i class="fa fa-circle-o"></i> Ajouter un secteur</a></li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Activité Agents</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/activite') }}"><i class="fa fa-circle-o"></i> Accueil</a></li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Tournée du jour</span>
               
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/geo') }}"><i class="fa fa-circle-o"></i> Géolocalisation d'agents</a></li>
                    
                </ul>
            </li>

             <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Réclamation client</span>
                
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/reclamation') }}"><i class="fa fa-circle-o"></i> Liste des réclamations</a></li>
                    <li><a href="{{route('reclamation.create')}}"><i class="fa fa-circle-o"></i> Ajouter une réclamations</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{{ url('/preuve') }}">
                <i class="fa fa-files-o"></i>
                <span>Preuve de livraison</span>
                </a>
            </li>

            <li class="treeview">

                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Suivi Livraison</span>
                
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/suivi') }}"><i class="fa fa-circle-o"></i> Accueil</a></li>
                    
                    
                </ul>
            </li>

             
            
            
        </ul>
    </section>
    <?php }
    else {
     ?>
<ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li> 
     <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Activité Agents</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/activite') }}"><i class="fa fa-circle-o"></i> Accueil</a></li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Tournée du jour</span>
               
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/geo') }}"><i class="fa fa-circle-o"></i> Géolocalisation d'agents</a></li>
                    
                </ul>
            </li>

             <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Réclamation client</span>
                
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/reclamation') }}"><i class="fa fa-circle-o"></i> Liste des réclamations</a></li>
                    <li><a href="{{route('reclamation.create')}}"><i class="fa fa-circle-o"></i> Ajouter une réclamations</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{{ url('/preuve') }}">
                <i class="fa fa-files-o"></i>
                <span>Preuve de livraison</span>
                </a>
            </li>

            <li class="treeview">

                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Suivi Livraison</span>
                
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/suivi') }}"><i class="fa fa-circle-o"></i> Accueil</a></li>
                    <li><a href="{{ url('/suivi') }}"><i class="fa fa-circle-o"></i> Liste des adresses</a></li>
                    
                </ul>
            </li>

             <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Rapport</span>
                </a>
            </li>

            
            
        </ul>
    </section>
     <?php }?>
    <!-- /.sidebar -->
</aside>