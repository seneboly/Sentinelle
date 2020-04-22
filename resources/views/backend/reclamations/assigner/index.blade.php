@extends('template.app')
@inject('f', 'App\Services\Helpers')
@section('title')

Assigner une réclamation | Gestion reclamations

@endsection


@section('page_name')

@include('template.inc.page_name', ['name'=>'Assigner une réclamation.'])

@endsection

@push('css')
<link href="{{asset('template_for_reclamations/dist/css/smart_wizard.css')}}" rel="stylesheet" type="text/css" />

<!-- Optional SmartWizard theme -->
<link href="{{asset('template_for_reclamations/dist/css/smart_wizard_theme_circles.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('template_for_reclamations/dist/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('template_for_reclamations/dist/css/smart_wizard_theme_dots.css')}}" rel="stylesheet" type="text/css" />
@endpush


@section('content')
 @include('message.message')
<div class="card mb-3" style="margin-top:30px">
  <div class="card-header">
    <i class="fas fa-edit"></i>
   Assigner réclamation(s).</div>
  <div class="card-body">
    
<form method="POST" action="{{route('assigner')}}">
  	<div class="row">
  		<div class="col-md-6 col-lg-6 form-group">
        @csrf
  			<label class="control-label">Selectionner une réclamation</label>
  			<select style="white-space: nowrap !important;" id="reclamations" name="reclamation_id" class="form-control">
  				
  			</select>
        <input type="hidden" name="assignateur" value="{{$auth->name}}"></input>
  		</div>

  		<div class="col-md-4 col-lg-4 form-group">

  			<label class="control-label">Choisir CCL OU ACE</label>
  			
  			<select class="form-control" id="assigner"  name="user_id">
         
  			</select>

        <!-- <select id="users" class="form-control"></select> -->
  		</div>

      <div class="col-md-2 col-lg-2 form-group">
        <input data-confirm="Etes-vous sûr de vouloir continuer cette action ?" type="submit" class="btn btn-dark btn-sm btn-block form-control text-white" value="Assigner" style="margin-top:22px">
      </div>
  	</div>
    </form>
  </div>
  <div  class="card-footer small text-muted">Assigner réclamation(s).</div>
</div>

@endsection

@push('js')
      <script type="text/javascript">


         $('#reclamations').select2({
           placeholder: 'Saisisser le nom ou code du client ',
           ajax: {
             url: "{{route('ajax-reclamation')}}",
             dataType: 'json',
             delay: 250,
             processResults: function (data) {
               return {
                 results:  $.map(data, function (item) {
                       return {
                           text: '[ '+item.nom_client+' ]'+' - [ '+item.created_at+' ]',
                           id: item.id
                       }
                   })
               };
             },
             cache: true
           }
         });


   </script>

    <script type="text/javascript">


         $('#assigner').select2({
           placeholder: 'Rechercher un CCL ou un ACE',
           ajax: {
             url: "{{route('ajax-assigner')}}",
             dataType: 'json',
             delay: 250,
             processResults: function (data) {
               return {
                 results:  $.map(data, function (item) {
                       return {
                           text: item.name,
                           id: item.id
                       }
                   })
               };
             },
             cache: true
           }
         });


   </script> 

@endpush