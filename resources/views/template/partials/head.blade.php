<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>@yield('title')</title>



<!-- Custom fonts for this template-->
<link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <meta name="csrf-token" content="{{csrf_token()}}">
<!-- Page level plugin CSS-->
<link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset('template/vendor/datatables/jquery.dataTables.js')}}" ></script>
<script type="text/javascript" src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}" ></script>

@stack('css')

<!-- Custom styles for this template-->

<link href="{{asset('template/css/ajax.min.css')}}" rel="stylesheet" />

<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

<link rel="icon" type="image/png" href="{{url('template/img/sgbs_logo.ico')}}"/>

<link rel="stylesheet" type="text/css" href="{{ asset('template\vendor\datatables\dataTables.bootstrap4.css ')}}">


<link href="{{asset('template/css/sb-admin.css')}}" rel="stylesheet">
