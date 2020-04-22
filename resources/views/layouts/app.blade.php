
<!DOCTYPE html>
<html>
 


<head>

<link rel="icon" type="image/png" href="{{url('template/img/sgbs_logo.ico')}}"/>

<link href="{{asset('logins/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="{{asset('logins/js/bootstrap.min.js')}}"></script>
<script src="{{asset('logins/js/jquery.min.js')}}"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Autor: Gabriel Ramirez | Diseñador Web
    Tema:Login Class="Gabriel".
    Fecha:11/01/2019.
    pagina Web: https://www.tonygabriel.ga/
    -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--====================================================================================================================================-->
  <link rel="stylesheet" href="{{asset('logins/css/bootstrap.min.css')}}" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<!--====================================================================================================================================-->
  <link rel="stylesheet" href="css/style.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<!--====================================================================================================================================-->
  <title>@yield('title')</title>
</head>
<body>



     
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Bienvenue</strong> sur l'outil de gestion des réclamations de la SGBS.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     <br>  <br>    
      @yield('content')
     
  <br>


</div> 
                <br> <br> <br> <br>
<!--====================================FOOOOOOOOTER==============================================-->
<footer class="page-footer font-small green">
                                    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="#" target="_blank">SOCIETE GENERALE SENEGAL </a><footer></footer>
    </div>
                                    <!-- Fin de Copyright -->
</footer>
<!--==============================FINDE FOOOTER==============================================-->


<!--====================================================================================================================================-->
  <script src="{{asset('logins/js/bootstrap.min.js')}}" ></script>
<!--====================================================================================================================================-->
  <script src="{{asset('logins/jquery.min.js')}}"></script>
<!--====================================================================================================================================-->
 

  <script type="text/javascript" src="{{asset('logins/js/main.js')}}"></script>