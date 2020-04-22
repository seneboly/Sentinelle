@if(session('status'))
<div class="alert {{session('class')}} alert-dismissible fade show" role="alert">
  <strong>{{session('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif