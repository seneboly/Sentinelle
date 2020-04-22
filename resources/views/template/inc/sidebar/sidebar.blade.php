@if($auth->roles)
<li class="nav-item ">
  <a class="nav-link" href="#">
    <p class="text-bold text-white">{{$auth->name}} ,</p>
    <p class="text-white text-bold font-12 text-left"><u class="text-white">{{$f->getNameRole($auth)}}</u></p>
  </a>
</li>
@endif
<li class="nav-item active">
  <a class="nav-link" href="{{route('home')}}">
    <i class="fas fa-fw fa-tachometer-alt text-white"></i>
    <span>Tableau de bord</span>
  </a>
</li>

<li class="nav-item dropdown text-white" >
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder text-white"></i>
          <span class="text-white">Réclamations</span>
        </a>
        
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; background-color:rgba(33,37,41, 0.01); will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
         
          <a class="dropdown-item text-white" style="white-space: nowrap; font-size: 13px;" href="{{route('reclamations.create')}}">Renseigner une réclamation</a>
          <div class="dropdown-divider"></div>
          
          <a class="dropdown-item text-white" style="white-space: nowrap; font-size: 13px" href="{{route('reclamations.index')}}">Réclamations traitées</a>
           <div class="dropdown-divider"></div>
          <a class="dropdown-item text-white" style="white-space: nowrap; font-size: 13px " href="{{route('reclamations_non_traitees')}}">Réclamations non traitées</a>
           <div class="dropdown-divider"></div>
          <a class="dropdown-item text-white" style="white-space: nowrap; font-size: 13px" href="{{route('reclamations_en_attente')}}">Réclamations en attente</a>
         @if($f->getNameRole($auth) !=="Assisantant Conseiller Clientèle (ACE) ")
          <div class="dropdown-divider"></div>
          
          <a class="dropdown-item text-white" href="{{route('assigner-reclamation')}}" style="white-space: nowrap; font-size: 13px">Assigner réclamation</a>
          
        </div>
        @endif
      </li>

</li>

    <li class="nav-item">
        <a class="nav-link text-white" href="{{route('getPersonnelReporting', Str::slug($auth->name))}}">
          <i class="fa fa-list-ul" aria-hidden="true"></i>
          <span>Reporting personnel</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-white" href="{{route('getParamas', Str::slug($auth->name))}}">
          <i class="fa fa-cog" aria-hidden="true"></i>
          <span>Paramètres du compte</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-white" data-method="POST" data-confirm="Êtes-vous sûr de vouloir continuer cette action ?" href="{{route('logout')}}">
          <i class="fa fa-power-off text-white" aria-hidden="true"></i>
          <span>Deconnexion</span></a>
    </li>

