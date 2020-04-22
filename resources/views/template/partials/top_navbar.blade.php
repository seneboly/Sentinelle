@inject('f', 'App\Services\Helpers')
<a class="navbar-brand mr-1" href="{{route('home')}}"><img src="{{asset('template/img/sentinelle.png')}}" width="180"></a>

   <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
     <i class="fas fa-bars"></i>
   </button>

   <!-- Navbar Search -->
   <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
     <div class="input-group">
       <input id="search" type="text" class="form-control" placeholder="Taper votre recherche ici..." aria-label="Search" aria-describedby="basic-addon2">
       <div class="input-group-append">
         <button class="btn btn-dark" type="button">
           <i class="fas fa-search"></i>
         </button>
       </div>
     </div>
   </form>

   <!-- Navbar -->
   <ul class="navbar-nav ml-auto ml-md-0">
    @auth
     <li class="nav-item dropdown no-arrow mx-1">
       <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog" aria-hidden="true"></i>

         
       </a>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
        
         <a class="dropdown-item" href="{{route('getPersonnelReporting', $user_name)}}">
          <i class="fa fa-list-ul" aria-hidden="true"></i>  Reporting personnel
        </a>
    
         <a class="dropdown-item" href="{{route('getParamas', $user_name)}}"><i class="fa fa-cog" aria-hidden="true"></i> 
           Paramètre du compte
       </a>
         
     </li>
     @endauth
     <li class="nav-item dropdown no-arrow mx-1">
       <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-power-off text-white" aria-hidden="true"></i>

         
       </a>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
         <a class="dropdown-item" data-method="POST" data-confirm="Êtes-vous sûr de vouloir continuer cette action ?" href="{{route('logout')}}">Deconnexion</a>
         
       </div>
     </li>
   
    
   </ul>