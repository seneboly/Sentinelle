@component('mail::message')
# Bonjour, 

Cette réclamation : <a href="{{route('reclamations.edit', $reclamation->code_reclamation)}}" style="color: #f00">{{$reclamation->code_reclamation}}</a> vous a été assignée {{$reclamation->created_at->diffForHumans()}} merci de bien vouloir la traiter.



Cordialement,<br>
{{ config('app.name') }}
@endcomponent
