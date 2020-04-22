<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title></title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    
 
  </head>

<div class="container">

  <form action="{{route('impayes')}}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">Joindre fichier</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      @csrf
    <div class="form-group">
      
      <input type="file"  name="file" class="form-control" id="exampleInputPassword1">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
  </form>


  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; {{Carbon\Carbon::now()->year}} SGBS</p>
    
  </footer>
</div>

</html>
