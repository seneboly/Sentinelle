@extends('layouts.app')

@section('title')
Connexion | Gestion des Réclamations
@endsection
@section('content')
<div class="container">
    <div class="row">

        <div class="col"><img src="{{asset('logins/img/user.png')}}" width="400" height="300" class="Avatar" style="margin-top:20%"></div>
        <div class="col">

        <form class="login100-form validate-form" method="post" action="{{route('login')}}">
           <div align="center" style="margin-bottom: 50px"><a class="">
                @csrf
          </div>
          <h3 align="center">CONNEXION</h3> <br> 
            <div class="container">
              <i class="fa fa-users"></i>
              <label for="">Email</label>
              <input type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}" placeholder="Entrer votre email">
              @if($errors->has('email'))
                <p class="alert alert-danger">{{$errors->first('email')}}</p>
              @endif
              <br>
              <i class="fa fa-key"></i>
              <label for="">Mot de passe</label>
              <input type="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Entrer votre de passe">
              @if($errors->has('password'))
              <p>{{$errors->first('password')}}</p>
              @endif
            </div>
            <br>
        
  
            <div class="col">
              <button type="submit" class="btn btn-danger btn-lg btn-block">
                Se connecter
              </button>
            </div>


      </form>

      <div class="row" style="margin:25px 30px">
        <p class="text-center"><a href="{{route('password.request')}}">Mot de passe oublié</a></p>
      </div>
      </div>

    </div>
    
</div>
@endsection
