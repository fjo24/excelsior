<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <meta content="" name="description">
                        <meta content="" name="author">
                            <title>
                                Panel de administración - @yield('titulo')
                            </title>
                            <link href="{{asset('img/layouts/logo-header.png')}}" rel="icon" type="image/png"/>
                            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                                <link href="{{ asset('plugins/materialize/css/materialize.min.css') }}" rel="stylesheet">
                                    <link href="{{ asset('css/admin/admin.css') }}" media="screen,projection" rel="stylesheet" type="text/css"/>
                                    <script src="//code.jquery.com/jquery-1.11.1.min.js">
                                    </script>
                                    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                                </link>
                            </link>
                        </meta>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <!-- CABECERA -->
        <header>
            <!-- Dropdown Structure -->
            <ul class="dropdown-content" id="dropdown1">
                <li>
                    <a class="right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('  Cerrar Sesión') }}
                            </a>
                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                @csrf
                            </form>
                </li>
            </ul>
            <nav>
                <a class="sidenav-trigger" data-target="slide-out" href="#">
                    <i class="material-icons">
                        menu
                    </i>
                </a>
                <div class="nav-wrapper">
                    <div class="container">
                        <a class="brand-logo" href="#!">
                            @yield('titulo')
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <!-- Dropdown Trigger -->
                            <li>
                                <a class="dropdown-trigger" data-target="dropdown1" href="#!">
                                    Bienvenido
                                    <i class="material-icons right">
                                        arrow_drop_down
                                    </i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <li>
                    <a href="sass.html">
                        Sass
                    </a>
                </li>
                <li>
                    <a href="badges.html">
                        Components
                    </a>
                </li>
                <li>
                    <a href="collapsible.html">
                        Javascript
                    </a>
                </li>
                <li>
                    <a href="mobile.html">
                        mama
                    </a>
                </li>
            </ul>
            <!-- SIDENAV MENU -->
            <ul class="sidenav sidenav-fixed" id="slide-out">
                <div class="logo">
                    <a class="brand-logo" href="" id="logo-container">
                        <img alt="" class="responsive-img" src="{{ asset('img/logoprincipal.png') }}">
                        </img>
                    </a>
                </div>
                <ul class="collapsible collapsible-accordion">
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Home
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('banner')}}">
                                        Editar Banner
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('home.create')}}">
                                        Editar Destacados
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                compare_arrows
                            </i>
                            Sliders
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('sliders.create')}}">
                                        Crear slider
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('sliders.index')}}">
                                        Editar slider
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                build
                            </i>
                            Servicios
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('servicios.index')}}">
                                        Editar servicio
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                thumb_up
                            </i>
                            Clientes
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('clientes.create')}}">
                                        Crear cliente
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('clientes.index')}}">
                                        Editar cliente
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                business
                            </i>
                            Mantenimiento
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('mantenimientos.create') }}">
                                        Editar contenido
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                business
                            </i>
                            Empresa
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('empresas.create') }}">
                                        Editar contenido
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                watch
                            </i>
                            Productos
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('categorias.create')}}">
                                        Crear Categoria
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('categorias.index')}}">
                                        Editar Categoria
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('productos.create')}}">
                                        Crear Producto
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('productos.index')}}">
                                        Editar Producto
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                work
                            </i>
                            Obras
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('cat-obras.create')}}">
                                        Crear categoria obra
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('cat-obras.index')}}">
                                        Editar categoria obra
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('obras.create')}}">
                                        Crear obra
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('obras.index')}}">
                                        Editar obra
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                business
                            </i>
                            Fabrica
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="">
                                        Editar fabrica
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                lightbulb_outline
                            </i>
                            Consejos
                        </a>
                        <div class="collapsible-body">
                            <ul> 
                                <li>
                                    <a href="{{route('consejos.create')}}">
                                        Crear consejo
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('consejos.index')}}">
                                        Editar consejo
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{--
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                insert_photo
                            </i>
                            Logos
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('logos.index')}}">
                                        Editar logos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    --}}
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                info
                            </i>
                            Datos de la empresa
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('datos.index')}}">
                                        Editar datos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                pin_drop
                            </i>
                            Metadatos
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('metadatos.index')}}">
                                        Editar Metadatos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
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
        </main>
        <!--Import jQuery before materialize.js-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript">
        </script>
        <!-- Materialize Core JavaScript -->
        <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}">
        </script>
        @yield('js')
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