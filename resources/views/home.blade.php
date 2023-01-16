{{-- <!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   </head>
   <body>
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">DropBix</a>
            </div>
            <ul class="nav navbar-nav">
               <li class="active"><a href="#">Home</a></li>
              
              
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
               <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
         </div>
      </nav>
	  <br>
	  <br>
      <div class="container">

         <section class="jumbotron text-center">
            <div class="container">
               <h1 class="jumbotron-heading">DropBix</h1>
               <p class="lead text-muted">Drop it Here!</p>
               <p>
                  <a href="#" class="btn btn-primary">Daftar Disini</a>
                  <a href="#" class="btn btn-secondary">Sudah Punya Akun? Login</a>
               </p>
            </div>
         </section>
      </div>
   </body>
	  <br>
	  <br>
	  <br>
	  <br>
   <footer class="text-muted">
      <div class="container">
      
         <p>Merupakan contoh dari &copy; Bootstrap</p>
      
      </div>
   </footer>
</html> --}}


@extends('template')

@section('content')

	  <br>
	  <br>
	  <br>
	  <br>
      <div class="container">

         <section class="jumbotron text-center">
            <div class="container">
               <h1 class="jumbotron-heading">DropBix</h1>
               <p>
                  <a href="{{ route('register') }}" class="btn btn-primary">Daftar Disini</a>
                  <a href="{{ route('login') }}" class="btn btn-secondary">Sudah Punya Akun? Login</a>
               </p>
            </div>
         </section>
      </div>
   </body>
	  <br>
	  <br>
	  <br>
	  <br>

@endsection