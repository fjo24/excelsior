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
  <!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">Cerrar Sesión</a></li>
</ul>

  <nav>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <div class="nav-wrapper">
      <div class="container">
      <a href="#!" class="brand-logo">@yield('titulo') </a>
      <ul class="right hide-on-med-and-down">
         <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Francisco Milano<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">mama</a></li>
  </ul>

  <!-- SIDENAV MENU -->
<ul id="slide-out" class="sidenav sidenav-fixed">
  <div class="logo"><a id="logo-container" href="" class="brand-logo">
          <img class="responsive-img" src="{{ asset('img/logoprincipal.png') }}" alt="">
        </a></div>
      


      <ul class="collapsible collapsible-accordion">

            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">home</i>Home</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('banner')}}">Editar Banner</a></li>
                  <li><a href="{{route('home.create')}}">Editar Destacados</a></li>
                  <li><a href=""></a></li>
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
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">build</i>Servicios</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('servicios.index')}}">Editar servicio</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">user</i>Clientes</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{route('clientes.create')}}">Crear cliente</a></li>
                  <li><a href="{{route('clientes.index')}}">Editar cliente</a></li>
                </ul>
              </div>
            </li>
            
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">business</i>Mantenimiento</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href= "{{ route('mantenimientos.create') }}">Editar contenido</a></li>
                </ul>
              </div>
            </li>

            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">business</i>Empresa</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{ route('empresas.create') }}">Editar contenido</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">watch</i>Productos</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="">Crear Categoria</a></li>
                  <li><a href="">Editar Categoria</a></li>
                  <li><a href="">Crear Producto</a></li>
                  <li><a href="">Editar Producto</a></li>
                  <li><a href="">Crear Modelo</a></li>
                  <li><a href="">Editar Modelo</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">chrome_reader_mode</i>Tipos de Ventanas</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="">Crear Tipo de ventana</a></li>
                  <li><a href="">Editar Tipo de ventana</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">check_box_outline_blank</i>Tipos de Vidrios</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="">Editar Tipo de vidrio</a></li>
                </ul>
              </div>
            </li>

            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">work</i>Obras</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="">Crear obra</a></li>
                  <li><a href="">Editar obra</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">business</i>Fabrica</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="">Editar fabrica</a></li>
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
                  <li><a href="">Editar datos</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-admin"><i class="material-icons">account_circle</i>Usuarios</a>
                <div class="collapsible-body">
                  <ul>
                    <li><a href="{{route('user.create')}}">Crear Usuario</a></li>
                    <li><a href="{{route('user.index')}}">Editar Usuario</a></li>
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
        <!--    @if(Auth::user())
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
            @endif-->
          </ul>

    </ul>

</header>  
<main style="">
  <div class="container">
  @yield('contenido')                                 
  </div>
  @yield('js')
</main>
        
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Materialize Core JavaScript -->
    <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
    <script type="text/javascript">


 /*         document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });
*/
  // Or with jQuery


$(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('.collapsible').collapsible();

  });
    </script>
</body>
</html>