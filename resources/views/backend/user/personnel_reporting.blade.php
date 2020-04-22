@extends('template.app')
@inject('f', 'App\Services\Helpers')
@section('title')

Reporting de  {{$auth->name}} | Gestion reclamations

@endsection




@section('page_name')

@include('template.inc.page_name', ['name'=>'Reporting de '.$auth->name])

@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('template_for_reclamations/src/css/tabs-css.css')}}">


@endpush

@section('content')

 <div class="container col-md-12 col-lg-12">
            
  <nav>
    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
     
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" data-toggle="tooltip"  title="Réclamations renseignées ( {{$rr}} )">RR ( {{$rr}} )</a> 
     
      <a class="nav-item nav-link" id="nav-rt-tab" data-toggle="tab"  data-toggle="tooltip" title="Réclamations traitées ( {{$rt}} )" href="#nav-rt" role="tab" aria-controls="nav-rt" aria-selected="false">RT ( {{$rt}} )</a>
      
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" data-toggle="tooltip" title="Réclamations en attente ( {{$rea}} )" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">REA ( {{$rea}} )</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" data-toggle="tooltip" title="Réclamations renseignées non traitées( {{$rnr}} )" aria-selected="false">RRNT ( {{$rnr}} ) </a>
      <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false" data-toggle="tooltip" title="Réclamations assignées ( {{$auth->reclamation->count()}} )">RA ( {{$auth->reclamation->count()}} )</a>
    </div>
  </nav>
  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
     
     <table class="table">
      @if($reclamation_renseignees->isNotEmpty())
       <thead class="thead-ligth">
         <tr>
           <th scope="col">#</th>
           <th scope="col">Code réclamation</th>
           <th scope="col">Client</th>
           <th scope="col">Date de renseignement</th>
           <th scope="col">Status</th>  
         </tr>
       </thead>
       @endif
       <tbody>
        @forelse($reclamation_renseignees as $reclamation)
         <tr>
           <th scope="row">{{$loop->index + 1}}</th>
           <td><a class="text-danger" href="{{route('reclamations.edit', $reclamation->code_reclamation)}}">{{$reclamation->code_reclamation}}</a></td>
           <td>{{$reclamation->client->nom_client}}</td>
           <td>@date($reclamation->created_at)</td>
           <td class="{{$f->colored($reclamation->status_reclamation->status) ?? ''}}" >{{$reclamation->status_reclamation->status}}</td>

         </tr>
         @empty
         <p class="text-center">Il y'a aucune réclamation renseignée pour le moment</p>
        @endforelse
       </tbody>
     </table>
     {{$reclamation_renseignees->links()}}
    </div>

    <div class="tab-pane fade" id="nav-rt" role="tabpanel" aria-labelledby="nav-rt-tab">
      
      <table class="table">
        @if($reclamation_renseignees_traitee->isNotEmpty())
        <thead class="thead-ligth">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code réclamation</th>
            <th scope="col">Client</th>
            <th scope="col">Date de renseignement</th>
            <th scope="col">Status</th>  
          </tr>
        </thead>
        @endif
        <tbody>
         @forelse($reclamation_renseignees_traitee as $reclamation)
          <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td><a class="text-danger" href="{{route('reclamations.edit', $reclamation->code_reclamation)}}">{{$reclamation->code_reclamation}}</a></td>
            <td>{{$reclamation->client->nom_client}}</td>
            <td>@date($reclamation->created_at)</td>
            <td class="{{$f->colored($reclamation->status_reclamation->status) ?? ''}}" >{{$reclamation->status_reclamation->status}}</td>

          </tr>
          @empty
          <p class="text-center">Il y'a aucun réclamation en attente pour le moment !</p>
         @endforelse
        </tbody>
      </table>
      {{$reclamation_renseignees_traitee->links()}}
    </div>

    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      
      <table class="table">
        @if($reclamation_renseignees_attente->isNotEmpty())
        <thead class="thead-ligth">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code réclamation</th>
            <th scope="col">Client</th>
            <th scope="col">Date de renseignement</th>
            <th scope="col">Status</th>  
          </tr>
        </thead>
        @endif
        <tbody>
         @forelse($reclamation_renseignees_attente as $reclamation)
          <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td><a class="text-danger" href="{{route('reclamations.edit', $reclamation->code_reclamation)}}">{{$reclamation->code_reclamation}}</a></td>
            <td>{{$reclamation->client->nom_client}}</td>
            <td>@date($reclamation->created_at)</td>
            <td class="{{$f->colored($reclamation->status_reclamation->status) ?? ''}}" >{{$reclamation->status_reclamation->status}}</td>

          </tr>
          @empty
          <p class="text-center">Il y'a aucun réclamation en attente pour le moment !</p>
         @endforelse
        </tbody>
      </table>
      {{$reclamation_renseignees_attente->links()}}
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
      <table class="table">
        @if($reclamation_renseignees_non_traitee->isNotEmpty())
        <thead class="thead-ligth">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code réclamation</th>
            <th scope="col">Client</th>
            <th scope="col">Date de renseignement</th>
            <th scope="col">RA</th>  
          </tr>
        </thead>
        @endif
        <tbody>
         @forelse($reclamation_renseignees_non_traitee as $reclamation)
          <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td><a class="text-danger" href="{{route('reclamations.edit', $reclamation->code_reclamation)}}">{{$reclamation->code_reclamation}}</a></td>
            <td>{{$reclamation->client->nom_client}}</td>
            <td>@date($reclamation->created_at)</td>
            <td class="{{$f->colored($reclamation->status_reclamation->status) ?? ''}}" >{{$reclamation->status_reclamation->status}}</td>

          </tr>
          @empty
          <p class="text-center">Il y'a aucune réclamation non renseignée pour le moment !</p>
         @endforelse
        </tbody>
        {{$reclamation_renseignees_non_traitee->links()}}
      </table>
    </div>
    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
      <table class="table">
        @if($auth->reclamation->isNotEmpty())
        <thead class="thead-ligth">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code réclamation</th>
            <th scope="col">Client</th>
            <th scope="col">Date de renseignement</th>
            <th scope="col">Status</th>  
          </tr>
        </thead>
        @endif
        <tbody>
         @forelse($auth->reclamation as $reclamation)
          <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td><a class="text-danger" href="{{route('reclamations.edit', $reclamation->code_reclamation)}}">{{$reclamation->code_reclamation}}</a></td>
            <td>{{$reclamation->client->nom_client}}</td>
            <td>@date($reclamation->created_at)</td>
            <td class="{{$f->colored($reclamation->status_reclamation->status) ?? ''}}" >{{$reclamation->status_reclamation->status}}</td>

          </tr>
          @empty
          <p class="text-center">Il y'a aucune réclamation assignée pour le moment !</p>
         @endforelse
        </tbody>
      </table>
      
    </div>
  </div>

</div>
        
<div class="row" style="padding-top: 70px">

<div class="col-md-4"></div>
<div class="col-md-4"></div>

<div class="col-md-4" style="padding-bottom:40px">

   <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">

     <div class="card-header">LEGENDE</div>
     <div class="card-body">
       <p style="white-space:nowrap; font-size: 13px;">RR : Réclamations renseignées</p>
       <p style="white-space:nowrap; font-size: 13px;">REA : Réclamations  en attente </p>
       <p style="white-space:nowrap; font-size: 13px;">RT : Réclamations traitées</p>
       <p style="white-space:nowrap; font-size: 13px;">RRNT : Réclamations renseignées et non traitées</p>
       <p style="white-space:nowrap; font-size: 13px;">RA : Réclamations assignées</p>
     </div>
   </div>

</div>

@endsection

@push('js')



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
@endpush
