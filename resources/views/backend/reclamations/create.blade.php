@extends('template.app')
@inject('f', 'App\Services\Helpers')
@section('title')

Renseigner une réclamation | Gestion reclamations

@endsection




@section('page_name')

@include('template.inc.page_name', ['name'=>'Renseigner une réclamation.'])

@endsection

@section('counter')
@include('template.inc.counter')



@endsection



@section('content')

@push('css')
<link href="{{asset('template_for_reclamations/dist/css/smart_wizard.css')}}" rel="stylesheet" type="text/css" />

<!-- Optional SmartWizard theme -->
<link href="{{asset('template_for_reclamations/dist/css/smart_wizard_theme_circles.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('template_for_reclamations/dist/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('template_for_reclamations/dist/css/smart_wizard_theme_dots.css')}}" rel="stylesheet" type="text/css" />
@endpush

  <div class="container">
    @include('message.message')
      
          <br />
          <form action="{{route('reclamations.store')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" enctype="multipart/form-data">

          <!-- SmartWizard html -->
          <div id="smartwizard">
              <ul>
                  <li><a href="#step-1">Etape 1<br /><small>Infos sur le client</small></a></li>
                  <li><a href="#step-2">Etape 2<br /><small>Justification</small></a></li>
                  <li><a href="#step-3">Etape 3<br /><small>Status de la réclamation</small></a></li>
                  <li><a href="#step-4">Etape 4<br /><small>Date de la réclamation</small></a></li>
              </ul>

              <div>

                  <div id="step-1" style="padding-bottom:70px">
                    <div class="container col-md-6 col-md-offset-3">
                      @include('error.error')
                    </div>
                     <div class="row">
                      @csrf
                       <div class="col-md-5">
                         <label class="control-label">Nom client</label>
                         <select class="form-control" id="clients" name="client_id" style="white-space: nowrap;" required="required">{{old('client_id')}}</select>
                       </div>
                       <div class="col-md-1"></div>
                       <div class="col-md-5" style="padding-bottom:30px">
                        @if($f->getNameRole($auth) ==='Conseiller clientèle (CCL)')

                        <label class="control-label">Nom du conseiller clientèle</label>
                        <input type="text" class="form-control" value="{{$auth->name}}" disabled="disabled">

                         <input class="form-control" type="hidden" name="user_id" value="{{$auth->id}}"></input>
                         @else
                         <label class="control-label">Nom du Conseiller Clientèle</label>
                         <select required="required" class="form-control" id="users" name="user_id"></select>
                         @endif
                       </div>

                      
                       
                     </div>
                     <div class="row" style="margin:70px 00"></div>
                  </div>
                  
                  <div id="step-2">
                       <div class="row" style="padding-bottom:50px">
                         <div class="col-md-5">
                          <label class="control-label">Motif de la réclamation</label>
                          <select class="form-control" name="motif_reclamation" required="required">
                            <option class="form-control"  selected="selected">Choisisser un motif</option>
                            <option class="form-control"  value="[ Virement local ] - Frais indus">[ Virement local ] - Frais indus</option>
                            <option class="form-control" value="[ Virement local ] - Non exécuté">[ Virement local ] - Non exécuté</option>
                            <option class="form-control" value="[ Virement local ] - Rejet">[ Virement local ] - Rejet</option>
                            <option class="form-control" value="[ Virement local ] - Différence montant">[ Virement local ] - Différence montant</option>
                            <option class="form-control" value="[ Virement local ] - doublon">[ Virement local ] - Doublon</option>
                            <option class="form-control" value="[ Virement local ] - retard">[ Virement local ] - Retard</option>
                            <option class="form-control" value="[ Chèque ] - erreur de saisie">[ Chèque ] - Erreur de saisie</option>
                            <option class="form-control" value="[ Chèque ]- impayé">[ Chèque ] - Impayé</option>
                            <option class="form-control" value="[ Chèque ] - valeur égarée">[ Chèque ] - Valeur égarée</option>
                            <option class="form-control" value="[ Chèque ] - opposition (compte dormant)">[ Chèque ] - Opposition (compte dormant)</option>
                            <option class="form-control" value="[virement étranger] - non exécuté">[virement étranger] - non exécuté</option>
                            <option class="form-control" value="[virement étranger] - frais indus">[virement étranger] - frais indus</option>
                            <option class="form-control" value="[virement étranger] - différence montant">[virement étranger] - différence montant</option>
                            <option class="form-control" value="[virement étranger] - doublon">[virement étranger] - doublon</option>
                            <option class="form-control" value="[virement étranger] - retard">[virement étranger] - retard</option>
                            <option class="form-control" value="[virement étranger] - rejet">[virement étranger] - rejet</option>
                            <option class="form-control" value="Paiement TPE">Paiement TPE</option>
                           
                          </select>
                        </div>
                        <div class="col-md-1"></div>
                         <div class="col-md-5">
                          <label class="control-label">Service traitant</label>
                          <select class="form-control" id="services" name="service_charge_reclamation_id" required="required"></select>
                        </div>

                        <input type="hidden" name="email_renseigneur" value="{{$auth->email}}">

                      </div>

                      <div class="row">
                        
                         <div class="col-md-5">
                          <label class="control-label">Justification réclamation</label>
                          <textarea class="form-control" name="justification_traitement" required="required"></textarea>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                          <label class="control-label">Canal de réception</label>
                          <input class="form-control" type="text" name="canal_reception" required="required">
                        </div>
                       

                      </div>

                      
                  </div>
                  <div id="step-3">
                    <div class="row" style="padding-bottom:50px">
                      
                       <div class="col-md-5">
                       <!--  <label class="control-label">Provenance de la réclamation</label> -->
                        <input type="hidden" value="Null" class="form-control" name="provenance_reclamation" required="required"></input>
                        <label class="control-label " >Joindre un document</label>
                        <input type="file" name="fileUploaded" class="form-control">
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-5">
                        <label class="control-label">Réponse partielle</label>
                        <select class="form-control" name="reponse_partielle" required="required">
                          <option class="form-control" value="1">OUI</option>
                          <option class="form-control" value="0">NON</option>
                        </select>
                      </div>
                     

                    </div>

                    <div class="row">
                       <div class="col-md-5">
                      
                        <label class="control-label">Status de la réclamation</label>
                        <select class="form-control" name="status_reclamation_id" required="required">
                          @foreach($status as $statu)
                          
                          <option class="form-control" value="{{$statu->id}}">{{$statu->status}}</option>

                          @endforeach

                        </select>

                      </div>
                     
                      <div class="col-md-1"></div>
                       <div class="col-md-5">
                        
                      </div>
                    </div>
                      
                  </div>
                  <div id="step-4" class="">
                     
                    <div class="row" style="padding-bottom:50px">
                      
                       <div class="col-md-5">
                        <label class="control-label">Date de réception SGBS</label>
                        <input type="date" class="form-control" name="date_reception_sgbs" required="required">
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-5">
                        <label class="control-label">Date de réception marché IAAO</label>
                        <input type="date" class="form-control" name="date_reception_marche_iaao" required="required">
                      </div>
                     

                    </div>

                     <div class="row">
                     

                       <div class="col-md-5">
                        <input type="hidden" class="form-control" value="{{now()}}" name="date_renseignement_reclamation">
                      </div>
                      
                      
                     

                    </div>


                  </div>
              </div>
          </div>

          </form>

      </div>







@push('js')



  
   <script type="text/javascript">


         $('#clients').select2({
           placeholder: 'Taper le code-client / le nom ou numero compte',
           ajax: {
             url: '{{route('ajax-client')}}',
             dataType: 'json',
             delay: 250,
             processResults: function (data) {
               return {
                 results:  $.map(data, function (item) {
                  
                       return {
                           text:item.code_client+' - '+item.nom_client,
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


         $('#users').select2({
           placeholder: 'Rechercher Conseiller Clientèle ici',
           ajax: {
             url: '{{route('ajax-ccl')}}',
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

 </script>



    <script type="text/javascript">


         $('#services').select2({
           placeholder: 'Choisisser une direction ici',
           ajax: {
             url: '{{route('ajax-service')}}',
             dataType: 'json',
             delay: 250,
             processResults: function (data) {
               return {
                 results:  $.map(data, function (item) {
                       return {
                           text: item.nom_service,
                           id: item.id
                       }
                   })
               };
             },
             cache: true
           }
         });


   </script>



 <!-- Include SmartWizard JavaScript source -->
    <script type="text/javascript" src="{{asset('template_for_reclamations/dist/js/jquery.smartWizard.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('template_for_reclamations/dist/js/bootstrap-validator.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Terminer')
                                   .addClass('btn btn-info')
                                   .on('click', function(){
                                          if( !$(this).hasClass('disabled')){
                                              var elmForm = $("#myForm");
                                              if(elmForm){
                                                  elmForm.validator('validate');
                                                  var elmErr = elmForm.find('.has-error');
                                                  if(elmErr && elmErr.length > 0){
                                                      alert('Oops des erreurs sont survenues. Merci de vérifier les informations');
                                                      return false;
                                                  }else{
                                                      
                                                      elmForm.submit();
                                                      return false;
                                                  }
                                              }
                                          }
                                      });
            var btnCancel = $('<button></button>').text('Annuler')
                                   .addClass('btn btn-danger')
                                   .on('click', function(){
                                          $('#smartwizard').smartWizard("reset");
                                          $('#myForm').find("input, textarea").val("");
                                      });





            // Smart Wizard
            $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'dots',
                    transitionEffect:'fade',
                    toolbarSettings: {toolbarPosition: 'bottom',
                                      toolbarExtraButtons: [btnFinish, btnCancel]
                                    },
                    anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                 });

            $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if(stepDirection === 'forward' && elmForm){
                    elmForm.validator('validate');
                    var elmErr = elmForm.children('.has-error');
                    if(elmErr && elmErr.length > 0){
                        // Form validation failed
                        return false;
                    }
                }
                return true;
            });

            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if(stepNumber == 3){
                    $('.btn-finish').removeClass('disabled');
                }else{
                    $('.btn-finish').addClass('disabled');
                }
            });

                  var b = document.querySelector('.sw-btn-prev').innerText = "Précédent";
                  var c = document.querySelector('.sw-btn-next').innerText = "Suivant";

                  var d = document.querySelector('#step-1').style.margin="00 35px";
                 

                  var f = document.querySelector('#step-2').style.margin="00 35px";
                  

                  var g = document.querySelector('#step-3').style.margin="00 35px";


        });


    </script>

   

@endpush
  
@endsection

