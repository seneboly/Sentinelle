@extends('template.app')
@inject('f', 'App\Services\Helpers')

@section('title')

Tableau de bord | Gestion reclamations

@endsection


@section('page_name')

@include('template.inc.page_name', ['name'=>'Accueil'])

@endsection

@section('counter')

@include('template.inc.counter')



@endsection

@section('content')

@if($reclamations->count())
<div class="card mb-3" style="margin-top:-30px">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Liste des réclamations</div>

  <div class="card-body">
    @if($reclamations->isNotEmpty())
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            @foreach($f->title_reclamations as $title)
            <th  style="word-wrap:normal; white-space: nowrap; font-size:12px">{{ucfirst($title)}}</th>
            @endforeach  
          </tr>
          
        </thead>
        <tfoot>
          <tr>
            @foreach($f->title_reclamations as $title)
            <th  style="word-wrap:normal; white-space: nowrap; font-size:12px">{{ucfirst($title)}}</th>
            @endforeach    
          </tr>
        </tfoot>
        <tbody class="text-left">
          @foreach($reclamations as $reclamation)
          


          <tr id="total_reclamation">
            <td>{{$loop->index + 1}}</td>
            <td>{{$reclamation->client->code_client}}</td>
           
            <td>{{$reclamation->client->nom_client}}</td>
            <td>{{$reclamation->user->name}}</td>
           
            <td>{{$reclamation->service_charge_reclamation->nom_service}}</td>
            <td>{{$reclamation->date_reception_sgbs->format('d-m-Y')}}</td>
            <td class="text-left {{$f->colored($reclamation->status_reclamation->status) ?? ''}}" style="white-space: nowrap;">{{$reclamation->status_reclamation->status}}</td>
            <td>
              <a class="btn btn-primary btn-xs" style="white-space:nowrap;" href="{{route('reclamations.edit', $reclamation)}}"><i class="fa fa-edit text-white"></i></a>
              
            </td>
          </tr>

           @endforeach
        </tbody>
      </table>
      @else
    <div class="card">
      <p class="text-center text-bold text-danger">Il y'a aucune reclamation pour le moment.</p>
    </div>
    </div>
    
    

    @endif
  </div>
  <div  class="card-footer small text-muted">Toutes les réclamations.</div>
</div>
@else
<div style="margin-top: 70px"></div>
<div class="container col-md-6 col-md-3">
  <p class="text-bold text-danger">
  Il y'a aucune reclamation pour le moment !
</p>
</div>  
@endif

@push('js')


<script type="text/javascript">
  
 
     $('#dataTable').DataTable( {
          paging: true,
          searching: true,
          orderCellsTop: true,
          fixedHeader: true,
            "order": [[ 0, "asc" ]],
            "scrollX": true,
             dom: 'Bfrtip',
             "language": {
                "lengthMenu": "Afficher _MENU_ enregistrements par page",
                "zeroRecords": "Ooops! Pas de résultat disponible  sur ce filtre ",
                "info": "Page _PAGE_ sur _PAGES_ pages",
                "infoEmpty": "Aucune donnée",
                "infoFiltered": "(filtré sur un total de _MAX_ )"
            },     

            dom: 'Bfrtip',
            buttons: [
               {
                   extend: "csv",
                   messageTop: "Extraction Help desk",
                   text: ' <i class="fa fa-file-text-o"></i> CSV ',
                   titleAttr: 'Exporter en CSV',
                   className: "btn-sm btn btn-default btn-export"
               },
               {
                   extend: "excel",
                   className: "btn-sm btn btn-default btn-export",
                   text: '<i class="fa fa-file-excel-o"></i> Excel',
                   titleAttr: 'Exporter en Excel',
                   messageTop: "Extraction Help desk"
               },
               {
                   extend: "pdfHtml5",
                   className: "btn-sm btn btn-default btn-export",
                   text: '<i class="fa fa-file-pdf-o"></i> Pdf',
                   titleAttr: 'Exporter en PDF',
                   messageTop: "Extraction Help desk"
               },
               {
                   extend: "print",
                   className: "btn-sm btn btn-default btn-export",
                   text: '<i class="fa fa-print"></i> Imprimer',
                   titleAttr: 'Imprimer',
                   messageTop: "Extraction Help desk"
               }  
   ],

     } );

</script>

@endpush
@endsection