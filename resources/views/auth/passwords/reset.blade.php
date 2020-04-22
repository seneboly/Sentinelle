@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col"><img src="{{asset('logins/img/user.png')}}" width="400" height="300" class="Avatar" style="margin-top:20%"></div>
        <div class="col">
            @include('message.message')
        
                <form class="login100-form validate-form" method="post" action="{{route('password.update')}}">
                   <div align="center" style="margin-bottom: 50px"><a class="">
                     @csrf
                  </div>
                  <h4 align="center">Réinitialisation du mot de passe</h4> <br> 
                    <div class="container">
                      <div class="form-group">
                          <i class="fa fa-users"></i>
                          <label for="">Mot de passe</label>
                          <input type="password" value="{{old('password')}}" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}">
                          @if($errors->has('password'))
                            <p class="alert alert-danger">{{$errors->first('password')}}</p>
                          @endif
                          <br>
                      </div>

                       <div class="form-group">
                          <i class="fa fa-users"></i>
                          <label for="">Confirmation du mot de passe</label>
                          <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}">
                          @if($errors->has('password_confirmation'))
                            <p class="alert alert-danger">{{$errors->first('password_confirmation')}}</p>
                          @endif
                          <br>
                      </div>

                      <input type="hidden" name="token" disabled="disabled" value="{{$token}}">
                     
                    <div class="row" style="padding-top:20px"></div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-danger btn-lg btn-block form-control">
                        Mettre à jour le mot de passe
                      </button>
                    </div>


              </form>

    </div>
    
</div>
@endsection
