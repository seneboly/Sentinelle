@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col"><img src="{{asset('logins/img/user.png')}}" width="400" height="300" class="Avatar" style="margin-top:20%"></div>
        <div class="col">
            @include('message.message')
        
                <form class="login100-form validate-form" method="post" action="{{route('password.email')}}">
                   <div align="center" style="margin-bottom: 50px"><a class="">
        <!--             <img src="{{asset('logins/img/reclamations.png')}}" width="300" height="185" class="img-fluid thumbnail pull-right"></a>
         -->                @csrf
                  </div>
                  <h4 align="center">Verification de l'adresse email</h4> <br> 
                    <div class="container">
                      <i class="fa fa-users"></i>
                      <label for="">Email</label>
                      <input type="text" value="{{old('email')}}" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Entrer votre email">
                      @if($errors->has('email'))
                        <p class="alert alert-danger">{{$errors->first('email')}}</p>
                      @endif
                      <br>
                    <div class="row" style="padding-top:20px"></div>
                    <div class="col">
                      <button type="submit" class="btn btn-danger btn-lg btn-block form-control">
                        Soumettre
                      </button>
                    </div>


              </form>

    </div>
    
</div>
@endsection
