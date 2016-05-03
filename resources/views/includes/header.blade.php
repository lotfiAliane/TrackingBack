 
<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/dashboard') }}" class="logo"><b>Tableau de </b>board</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"/>
                    <span class="hidden-xs">{{Session::get('employeNom') }} {{Session::get('employePrenom') }} </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
                            <p>
                            {{Session::get('employeNom') }} {{Session::get('employePrenom') }} - {{Session::get('SemployePoste') }} 
                            
                            </p>
                        </li>
                        <!-- Menu Body -->
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('employe.edit',Session::get('SemployeID'))}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <script type="text/javascript">

            var liste_out = new Array();

            var liste_in = new Array();

            var liste_global_out= new Array();

             var liste_global_in = new Array();

            function list_agent_in_secteur($id) 
             {
                liste_global_in.push($id);
               
             }


    </script>
</header>