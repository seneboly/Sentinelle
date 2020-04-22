@if($errors->count())

<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <h5>@if($errors->count() > 1)
  		Merci de corriger les erreurs ci-dessous.
  </h5>
  		@else
  <h5>
  		Merci de corriger l'erreur ci-dessous. </h5>
  	 @endif
  	
	@foreach($errors->all() as $error)

	<ul>
		<li style="white-space:nowrap;">{{$error}}</li>
	</ul>

	@endforeach


</div>

@endif