<!doctype html>
<html>
  <head>
    <title>Import CSV Data to MySQL database with Laravel</title>
  </head>
  <body>
     <!-- Message -->
     @if(Session::has('message'))
        <p class="alert {{session('class')}}" >{{ Session::get('message') }}</p>
     @endif

     <!-- Form -->
     <form method='post' action="{{route('user_uploadFile')}}" enctype='multipart/form-data' >
       @csrf
       <input type='file' name='file' >
       <input type='submit' name='submit' value='Import'>
     </form>
  </body>
</html>