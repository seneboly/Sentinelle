
<!DOCTYPE html>
<html lang="en">

<head>

  @include('template.partials.head')

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-danger fixed-top">
    @include('template.partials.top_navbar')
  </nav>

  <div id="wrapper" style="padding-top: 70px">
    
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      @include('template.inc.sidebar.sidebar')
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb bg-default container">
          @yield('page_name')
        </ol>

        <!-- Icon Cards-->
        <div class="container">
          @yield('counter')
        </div>

       <div class="container">
         @yield('content')
       </div>
        

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
       @include('template.partials.footer')
    </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
  
  <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{asset('template/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('template/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('template/js/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('template/js/demo/chart-area-demo.js')}}"></script>

  <script type="text/javascript" src="{{asset('template/js/larails.js')}}"></script>

 

 
   <script src="{{asset('template/js/ajax.js')}}"></script>
   

   @stack('js')

   
</body>

</html>
