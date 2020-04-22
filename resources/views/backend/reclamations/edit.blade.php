@extends('template.app')
@inject('f', 'App\Services\Helpers')
@section('title')

Renseigner une réclamation | Gestion reclamations

@endsection




@section('page_name')

@include('template.inc.page_name', ['name'=>'Traitement réclamation : '.$reclamation->code_reclamation])

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
          <form action="{{route('reclamations.update', $reclamation)}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">

          <!-- SmartWizard html -->
          <div id="smartwizard">
              <ul>
                  <li><a href="#step-1">Etape 1<br /><small>Infos sur le client</small></a></li>
                  <li><a href="#step-2">Etape 2<br /><small>Justification</small></a></li>
                  <li><a href="#step-3">Etape 3<br /><small>Status de la réclamation</small></a></li>
                  <li><a href="#step-4">Etape 4<br /><small>Date de la réclamation</small></a></li>
              </ul>

              <div>

                  <div id="step-1" style="margin:30px 00">
                    <div class="container col-md-6 col-md-offset-3">
                      @include('error.error')
                    </div>
                     <div class="row">
                      @csrf
                      @method('PUT')
                       <div class="col-md-5">
                         <label class="control-label">Nom client</label>
                         <select class="form-control" id="clients" name="client_id" style="white-space: nowrap;">
                           <option value="{{$reclamation->client->id}}" selected="selected">{{$reclamation->client->nom_client}}</option>
                         </select>
                       </div>
                       <div class="col-md-1"></div>
                       <div class="col-md-5">
                        @if($f->getNameRole($auth) ==='Conseiller Clientèle (CCL)')

                        <label class="control-label">Nom du Conseiller Clientèle</label>
                         <input class="form-control" name="user_id" value="{{$auth->name}}" disabled="disabled"></input>
                         @else
                         <label class="control-label">Nom du Conseiller Clientèle</label>
                         <select class="form-control" id="users" name="user_id" required="required">
                           <option value="{{$reclamation->user->id}}" selected="selected">{{$reclamation->user->name}}</option>
                         </select>
                         @endif
                       </div>

                     </div>
                     <div class="row" style="padding-top: 30px">
                       <div class="col-md-5 form-group">
                         <label class="control-label">Nom du renseigneur</label>
                         <input class="form-control"  value="{{$f->getNameOf($reclamation->email_renseigneur)}}" disabled="disabled"></input>
                       </div>
                     </div>
                  </div>
                  
                  <div id="step-2">
                       <div class="row" style="margin:30px 00">
                        <div class="col-md-5">
                          <label class="control-label">Motif de la réclamation</label>
                          <select class="form-control" name="motif_reclamation" required="required">

                            <option class="form-control" value="{{$reclamation->motif_reclamation}}" selected="selected">{{$reclamation->motif_reclamation}}</option>

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
                          <select class="form-control" id="services" name="service_charge_reclamation_id" required="required">
                            <option value="{{$reclamation->service_charge_reclamation_id}}" selected="selected">{{$reclamation->service_charge_reclamation->nom_service}}</option>
                          </select>
                        </div>

                        <input type="hidden" name="email_renseigneur" value="{{$auth->email}}">

                      </div>

                      <div class="row">
                        
                         <div class="col-md-5">
                          <label class="control-label">Justification réclamation</label>
                          <textarea class="form-control" name="justification_traitement">{{$reclamation->justification_traitement}}</textarea>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                          <label class="control-label">Canal de réception</label>
                          <input class="form-control" type="text" name="canal_reception" value="{{$reclamation->canal_reception}}">
                        </div>
                       

                      </div>

                      
                  </div>
                  <div id="step-3">
                    <div class="row" style="margin:30px 00">
                      
                       <div class="col-md-5">
                        <!-- <label class="control-label">Provenance de la réclamation</label> -->
                        <input type="hidden" class="form-control " name="provenance_reclamation" value="{{$reclamation->provenance_reclamation}}" required="required">

                        <label class="control-label">Réponse partielle</label>
                        <select class="form-control" name="reponse_partielle">
                         
                          <option class="form-control" value="1">OUI</option>
                          <option class="form-control" value="0">NON</option>
                        </select>

                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-5">
                       <label class="control-label">Caractère traitement</label>
                       <select class="form-control" name="caractere_traitement">
                         <option class="form-control" value="Fondée">Fondée</option>
                         <option class="form-control" value="Non fondée">Non fondée</option>
                       </select>
                      </div>
                     

                    </div>

                    <div class="row">
                      <div class="col-md-5">
                        <label class="control-label">Status de la réclamation</label>
                        <select class="form-control" name="status_reclamation_id">
                          
                          @foreach($status as $statu)
                          @if($statu->id == $reclamation->status_reclamation_id)
                          <option class="form-control" value="{{$statu->id}}" selected="selected">{{$statu->status}}</option>
                          @else
                          <option class="form-control"  value="{{$statu->id}}">{{$statu->status}}</option>
                          @endif
                          @endforeach

                        </select>
                      </div>
                      <div class="col-md-1"></div>

                       <div class="col-md-5">
                        
                      </div>
                    </div>
                      
                  </div>
                  <div id="step-4" class="">
                     
                    <div class="row" style="margin:30px 00">
                      
                       <div class="col-md-5">
                        <label class="control-label">Date de réception SGBS</label>
                        <input type="text" class="form-control" name="date_reception_sgbs" onclick="(this.type='date')" value="{{$reclamation->date_reception_sgbs}}">
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-5">
                        <label class="control-label">Date de réception marché IAAO</label>
                        <input type="text" required="required" class="form-control" onclick="(this.type='date')" name="date_reception_marche_iaao" value="{{$reclamation->date_reception_marche_iaao}}">
                      </div>
                     

                    </div> 
                      

                     <div class="row">
                      
                      
                      <div class="col-md-1"></div>

                       <div class="col-md-5">
                       
                        <div class="col-md-5">
                        <input type="hidden" class="form-control" value="{{now()}}" name="date_traitement_reclamation">
                      </div>
                      </div>                    
                    
                    </div>

                    <div class="row">
                      @if($reclamation->date_clocture_reelle)
                      

                      <div class="col-md-5">
                        <label class="control-label">Date de clocture</label>
                        <input type="text" class="form-control text-bold text-danger" required="required" value="{{$reclamation->date_clocture_reelle}}" onclick="(this.type='date')" name="date_clocture_reelle">
                      </div>
                      @else
                      <div class="col-md-5">
                        <label class="control-label">Date de clocture</label>
                        <input type="date" class="form-control" name="date_clocture_reelle">
                      </div>
                      @endif
                      <div class="col-md-1"></div>
                      @if($reclamation->status_reclamation_id == 1 && $reclamation->date_clocture_reelle != null)
                      <div class="col-md-5">
                        <label class="control-label">Durée de traitement en jour</label>
                        <input type="text"  class="form-control"  value="{{$reclamation->duree_traitement}}" disabled="disabled">
                      </div>
                      @endif
                    </div>
                    @if($reclamation->fileName)
                    <div class="row" style="padding: 30px 30px">
                      <div class="col-md-5 ">
                        <label class="control-label">Document joint à la réclamation</label><br>
                        <a href="{{asset('public/storage/fichiers/reclamations/'.$reclamation->fileName)}}" download="{{$reclamation->fileName}}"><i class="fa fa-download" aria-hidden="true" style="width: 24px !important; height: 35px !important;"></i>Telecharger</a>
                      </div>
                    </div>
                    @endif
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
             url: "{{route('ajax-client')}}",
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
             url: "{{route('ajax-ccl')}}",
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

    <script type="text/javascript">


         $('#services').select2({
           placeholder: 'Choisisser une direction ici',
           ajax: {
             url: '/reclamations/ajax-service',
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
                  var b = document.querySelector('.sw-btn-next').innerText = "Suivant";


        });


    </script>

   

@endpush
  
@endsection

