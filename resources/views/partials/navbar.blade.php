      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">ARSIP ERBA</a>
            </div>
            <ul class="nav navbar-nav">
               <li class="active"><a href="{{ route('home') }}">Home</a></li>

                @if(Auth::user())
                  <li class="active"><a href="{{ route('upload') }}">Upload File</a></li>
			             <li class="active"><a href="{{ route('list-file') }}">List File</a></li>
                @endif
            </ul>

			 <ul class="nav navbar-nav navbar-right">
             @if(Auth::user())
			         <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			       @else
		           {{-- <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Daftar</a></li> --}}
               <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			       @endif
            </ul>
         </div>
      </nav>

            {{-- <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">DropBix</a>
            </div>
            <ul class="nav navbar-nav">
               <li class="active"><a href="/home">Home</a></li>
			   <li class="active"><a href="/upload">Upload File</a></li>
			   <li class="active"><a href="#">Download File</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
               <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
         </div>
      </nav> --}}