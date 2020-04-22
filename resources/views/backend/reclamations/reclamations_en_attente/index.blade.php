@extends('template.app')
@inject('f', 'App\Services\Helpers')
@section('title')

Réclamations en attente de traitement | Gestion reclamations

@endsection


@section('page_name')

@include('template.inc.page_name', ['name'=>'Liste des réclamations en attente de traitement.'])

@endsection

@section('counter')
  @include('template.inc.counter')
@endsection


@section('content')
<!-- DataTables Example -->
     <div class="card mb-3">
      @include('message.message')
       <div class="card-header">

         <i class="fas fa-table"></i>
         Toutes les réclamations en attente de traitement</div>
       <div class="card-body">
        @if($reclamations->isNotEmpty())
         <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
               <tr>
                   @foreach($f->title_reclamations as $title)
                   <th  style="word-wrap:normal; white-space: nowrap; font-size:12px">{{ucfirst($title)}}
                   @endforeach 
               </tr>
             </thead>
             <tfoot>
               <tr>
                  @foreach($f->title_reclamations as $title)
                   <th  style="word-wrap:normal; white-space: nowrap; font-size:12px">{{ucfirst($title)}}
                   @endforeach
               </tr>
             </tfoot>
             <tbody class="text-left">
             	@foreach($reclamations as $reclamation)
               <tr>
                 <td>{{$loop->index + 1}}</td>
                 <td>{{$reclamation->client->code_client}}</td>
                 <td>{{$reclamation->client->numero_compte}}</td>
                 <td>{{$reclamation->client->nom_client}}</td>
                 <td>{{$reclamation->user->name}}</td>
                 <td>{{$reclamation->service_charge_reclamation->nom_service}}</td>
                 <td class="{{$f->colored($reclamation->status_reclamation->status) ?? ''}}">{{$reclamation->status_reclamation->status}}</td>
                 <td>
                 
                 	<a class="btn btn-primary" href="{{route('reclamations.edit', $reclamation)}}"><i class="fa fa-edit text-white"></i></a>
                 </td>
               </tr>
               
                @endforeach
             </tbody>
           </table>
         </div>
       </div>
       @else
       <p class="text-center font-bold text-danger">Il y'a pas de réclamation en attente pour le moment</p>
       @endif
       <div class="card-footer small text-muted">Cette liste montre uniquement les réclamations en attente de traitement.</div>
     </div>
@endsection