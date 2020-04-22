
<div class="row container">

  <div class="col-md-3 col-lg-3 mb-3">
    <div class="card text-white bg-primary o-hidden h-50">
      <div class="card-body">
        <a class="text-white" style="text-decoration:none;" href="{{route('clients.index')}}">

        <div class="card-body-icon">
          <i class="fas fa fa-users" aria-hidden="true"></i>
        </div>
        <div class="mr-5"><h4 class="text-left">{{$clients->count()}}</h4> <h6 style="white-space: nowrap; padding-bottom: 20px">{{str_plural('Client', $clients->count() )}}</h6></div>
      </a>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{route('all_clients')}}">
        <span class="float-left">Voir détail</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>

  <div class="col-md-3 col-lg-3  mb-3">
    <div class="card text-white bg-warning o-hidden h-50">
      <div class="card-body">
        <a class="text-white" style="text-decoration:none;" href="{{route('home')}}/#total_reclamation">

        <div class="card-body-icon">
          <i class="fas fa fa-minus-circle" aria-hidden="true"></i>
        </div>
        <div class="mr-5"><h4>{{$reclamations->count()}}</h4> <h6 style="white-space: nowrap; padding-bottom: 20px">{{str_plural('Total réclamations', $reclamations->count())}}</h6></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{route('home')}}/#total_reclamation">
        <span class="float-left">Voir détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>

  <div class="col-md-3 col-lg-3 mb-3">
    <div class="card text-white bg-success o-hidden h-50">
      <div class="card-body">
          <a class="text-white" style="text-decoration:none;" href="{{route('reclamations.index')}}">
        <div class="card-body-icon">
          <i class="fas fa fa-thumbs-up" aria-hidden="true"></i>
        </div>
        <div class="mr-5"><h4>{{$reclamations_traitees }}</h4> <h6 style="white-space:nowrap;padding-bottom: 20px">{{str_plural('Réclamations traitée',  $reclamations_traitees)}}</h6></div>
      </a>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{route('reclamations.index')}}">
        <span class="float-left">Voir détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>

  <div class="col-md-3 col-lg-3 mb-3">
    <div class="card text-white bg-danger o-hidden h-50">
      <div class="card-body">
        <a class="text-white" style="text-decoration:none;" href="{{route('reclamations_non_traitees')}}">
        <div class="mr-5"><h4>{{$reclamations_nonTraitees }}</h4> <h6 style="white-space: nowrap;">{{str_plural('Réclamations nons traitée', $reclamations_nonTraitees )}}</h6></div>
        <div class="card-body-icon">
          <i class="fas fa fa-thumbs-down" aria-hidden="true"></i>
        </div>
       </a>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{route('reclamations_non_traitees')}}">
        <span class="float-left">Voir détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>

  
</div>




