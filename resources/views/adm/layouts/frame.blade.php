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
    
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/admin.css') }}"  media="screen,projection"/>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <!-- CABECERA -->
<header>
 <nav class="top-nav">
        <div class="container">
          <div class="nav-wrapper">
 

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

      <!-- MENÚ

      <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a></div> -->
      

      <ul id="nav-mobile" class="side-nav fixed">
        <div class="logo"><a id="logo-container" href="" class="brand-logo">
          <img class="responsive-img" src="{{ asset('img/logo/logo-header.png') }}" alt="">
        </a></div>
        <li class="no-padding">

          <ul class="collapsible collapsible-accordion">

            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">home</i>Home</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('home.create')}}">Editar lineas home</a></li>
                  <li><a href="{{route('destacados.index')}}">Editar destacados</a></li>
                </ul>
              </div>
            </li>

            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">business</i>Empresa</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('contenidoempresa.index')}}">Editar contenido</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">watch</i>Productos</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('categorias.create')}}">Crear Categoria</a></li>
                  <li><a href="{{route('categorias.index')}}">Editar Categoria</a></li>
                  <li><a href="{{route('productos.create')}}">Crear Producto</a></li>
                  <li><a href="{{route('productos.index')}}">Editar Producto</a></li>
                  <li><a href="{{route('modelos.create')}}">Crear Modelo</a></li>
                  <li><a href="{{route('modelos.index')}}">Editar Modelo</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">chrome_reader_mode</i>Tipos de Ventanas</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('tiposventana.create')}}">Crear Tipo de ventana</a></li>
                  <li><a href="{{route('tiposventana.index')}}">Editar Tipo de ventana</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">check_box_outline_blank</i>Tipos de Vidrios</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('tiposvidrio.index')}}">Editar Tipo de vidrio</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">build</i>Servicios</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('servicios.index')}}">Editar servicio</a></li>
                </ul>
              </div>
            </li>

            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">work</i>Obras</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('obras.create')}}">Crear obra</a></li>
                  <li><a href="{{route('obras.index')}}">Editar obra</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">business</i>Fabrica</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('fabrica.index')}}">Editar fabrica</a></li>
                </ul>
              </div>
            </li>

            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">compare_arrows</i>Sliders</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('sliders.create')}}">Crear slider</a></li>
                  <li><a href="{{route('sliders.index')}}">Editar slider</a></li>
                </ul>
              </div>
            </li>

        {{--      <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">insert_photo</i>Logos</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('logos.index')}}">Editar logos</a></li>
                </ul>
              </div>
            </li>

--}}

            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">info</i>Datos de la empresa</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('empresa.index')}}">Editar datos</a></li>
                </ul>
              </div>
            </li>

         {{--    <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">pin_drop</i>Metadatos</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('metadatos.index')}}">Editar Metadatos</a></li>
                </ul>
              </div>
            </li>--}}
            @if(Auth::user())
                @if(Auth::user()->nivel === 'administrador')
              <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">account_circle</i>Usuarios</a>
                <div class="collapsible-body">
                  <ul>
                    <li><a href="{{route('user.create')}}">Crear Usuario</a></li>
                    <li><a href="{{route('user.index')}}">Editar Usuario</a></li>
                  </ul>
                </div>
              </li>
              @endif
            @endif
          </ul>

      </ul>
      <a class="btn" data-activates="nav-mobile"><i class="material-icons">menu</i></a>
</header>  
    @yield('contenido')                                 
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Materialize Core JavaScript -->
    <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/drop.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('select').material_select();
        });

          document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
  $(document).ready(function(){
    $('.btn').sideNav();
  });

        
    </script>


</body>
</html>