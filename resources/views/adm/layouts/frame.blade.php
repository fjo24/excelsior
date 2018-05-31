<!DOCTYPE html>
  <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <title>Panel de administración - @yield('titulo')</title>

    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}">
    
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin.css') }}"  media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <!-- CABECERA -->
      <header>
      <nav class="top-nav">
        <div class="container">
          <div class="nav-wrapper">
            <input type="checkbox" id="btn-menu" style="display: none!important;">
      <label for="btn-menu"><i class="material-icons">menu</i></label>

      <a class="page-title">
            @yield('titulo')
          </a>
            <div class="right dropdown-menu" aria-labelledby="navbarDropdown">

                                  |
                                    <a class="right" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('  Cerrar Sesión|') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </div>
          </div>
        </div>
      </nav>


    </header>  
    @yield('contenido')                                 
        </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Materialize Core JavaScript -->
    <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>


</body>
</html>