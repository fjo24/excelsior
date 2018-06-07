<div container="">
    <header>
        {{-- BARRA SUPERIOR --}}
        <div class="container-fluid top hide-on-med-and-down">
            <div class="list-top row">
                <div class="li-red">
                    <a href="">
                        <img alt="" src="{{asset('img/layouts/logo-top-face.png')}}" style="margin-right: 2px;">
                        </img>
                    </a>
                </div>
                <div class="li-red">
                    <a href="">
                        <img alt="" src="{{asset('img/layouts/search.png')}}">
                        </img>
                    </a>
                </div>
                <div class="li-contacto">
                    <a href="">
                        <img alt="" src="{{asset('img/layouts/mail.png')}}" style="margin-right: 5px;">
                            CONTACTO
                        </img>
                    </a>
                </div>
                <div class="li-presupuesto">
                    <a href="">
                        <img alt="" src="{{asset('img/generico/correo2.png')}}" style="margin-right: 0px;">
                            SOLICITUD DE PRESUPUESTO
                        </img>
                    </a>
                </div>
            </div>
        </div>
        {{-- BARRA PRINCIPAL --}}
        <nav>
            <div class="nav-wrapper principal">
                <ul class="left hide-on-med-and-down">
                    <li>
                        <a href="sass.html">
                            MANTENIMIENTO
                        </a>
                    </li>
                    <li>
                        <a href="badges.html">
                            PRODUCTOS
                        </a>
                    </li>
                    <li>
                        <a href="collapsible.html">
                            EMPRESA
                        </a>
                    </li>
                </ul>
                <a class="brand-logo center" href="{{ url('/') }}">
                    <img alt="" src="{{asset('img/layouts/logo-header.png')}}">
                    </img>
                </a>
                <a class="sidenav-trigger" data-target="mobile-demo" href="#">
                    <i class="material-icons">
                        menu
                    </i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="badges.html">
                            CONSEJOS DE SEGURIDAD
                        </a>
                    </li>
                    <li>
                        <a href="collapsible.html">
                            OBRAS
                        </a>
                    </li>
                    <li>
                        <a href="mobile.html">
                            CLIENTES
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li>
                <a href="sass.html">
                    MANTENIMIENTO
                </a>
            </li>
            <li>
                <a href="badges.html">
                    PRODUCTOS
                </a>
            </li>
            <li>
                <a href="collapsible.html">
                    EMPRESA
                </a>
            </li>
            <li>
                <a href="badges.html">
                    CONSEJOS DE SEGURIDAD
                </a>
            </li>
            <li>
                <a href="collapsible.html">
                    OBRAS
                </a>
            </li>
            <li>
                <a href="mobile.html">
                    CLIENTES
                </a>
            </li>
        </ul>
    </header>
</div>