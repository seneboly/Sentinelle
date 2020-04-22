@extends('template.app')
@inject('f', 'App\Services\Helpers')

@section('title')

Tableau de bord | Gestion clients

@endsection


@section('page_name')

@include('template.inc.page_name', ['name'=>'Client'])

@endsection

@section('counter')

@include('template.inc.counter')



@endsection

@section('content')

<div class="card mb-3" style="margin-top:-30px">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Liste des réclamations</div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            @foreach($f->title_show_client_infos as $title)
            <th  style="word-wrap:normal; white-space: nowrap; font-size:12px">{{ucfirst($title)}}</th>
            @endforeach  
          </tr>
          
        </thead>
        <tfoot>
          <tr>
            @foreach($f->title_show_client_infos as $title)
            <th  style="word-wrap:normal; white-space: nowrap; font-size:12px">{{ucfirst($title)}}</th>
            @endforeach    
          </tr>
        </tfoot>
        <tbody class="text-left">
          @forelse($clients as $client)
          


          <tr id="total_reclamation">
            <td>{{$loop->index + 1}}</td>
            <td>{{$client->code_client}}</td>
            <td>{{$client->nom_client}}</td>
            <td class="text-info">{{$client->reclamations->count()}}</td>
            <td>{{$client->code_gestionnaire}}</td>
            <td>{{$client->numero_agence}}</td>
            
          </tr>
            
           
           @empty

           <p class="text-center text-danger">Il y'a aucun client pour le moment.</p>
           @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div  class="card-footer small text-muted">Tous les clients.</div>
</div>


@endsection