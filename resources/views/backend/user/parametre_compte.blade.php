@extends('template.app')
@inject('f', 'App\Services\Helpers')
@section('title')

Profil {{$auth->name}} | Gestion reclamations

@endsection




@section('page_name')

@include('template.inc.page_name', ['name'=>'Paramètre du compte de : '.$auth->name])

@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('template_for_reclamations/src/css/tabs-css.css')}}">

@endpush

@section('content')

<div class="container col-md-12 col-lg-12">
            
  <nav>
    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Modifier votre mot de passe</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Informations personnelles</a>

    </div>
  </nav>
  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
     
     <div class="container col-md-8 col-md-offset-2">
      @include('message.message')
      <form method="POST" action="{{route('utilisateurs.update', $auth)}}" class="form-inline">
        @csrf
        @method('PUT')
          <div class="form-group col-md-4">
            <label class="control-label">Nouveau mot de passe</label>
            <input type="password" name="password" class="form-control"></input>
          </div>
          <div class="col-md-1"></div>
          <div class="form-group col-md-4">
            <label class="control-label">Confirmation mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control"></input>
          </div>
        <div class="col-md-1"></div>
        <div class="col-md-2 form-group">
          <label class="control-label"></label>
          <input class="form-control btn btn-dark" type="submit" value="Mettre à jour">
        </div>

        <div class="container" style="margin-top:50px">
          @include('error.error')
        </div>
      </form>

      
    
      
    </div>

    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="container">
          <div class="card col-md-12" >
            <div class="card-body">
              <h5 class="card-title text-center">{{$f->getNameRole($auth)}}</h5>
              <h6 class="card-subtitle mb-2 text-center">Nom complet : {{$auth->name}}</h6>
              <h6 class="card-text text-center">Code Gestionnaire : {{$auth->code_gestionnaire ? $auth->code_gestionnaire : 'Non renseigné'}}</h6>
              
            </div>
          </div>
        </div>
    </div>
 
  </div>

</div>
        
<div class="row">



</div>

@endsection

