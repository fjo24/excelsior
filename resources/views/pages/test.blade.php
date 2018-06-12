<!DOCTYPE html>

<html lang="es">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <title>DAVONIS</title>  

    <link rel="icon" type="image/png" href="{{ asset($favicon->ruta) }}"/>

    <script type="text/javascript" src="{{ asset('js/jquery-2.2.0.min.js') }}"></script> 



   <!-- Bootstrap-->

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/inicio.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/style.css') }}">





    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/russo-styles.css') }}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/productos.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">



    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> 

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    

<style>

    .hover:hover

    {

        background-color: #DDDDDD;

    }



    .breadcrumb>li+li:before

    {

    content: none;

    }



    table

    {

        border:none;

        border-top:1px solid black;

        border-bottom:1px solid black;

        font-weight: lighter;

        color:#777777;

        width: 100%;

    }



    td

    {

        padding-top: 5px;

        padding-bottom: 5px;

        border:0;


    }



    h2

    {

        color:#122C78;

        font-size: 15px;

        font-weight: bold;

        text-transform: uppercase;

        margin-bottom: 15px;

    }

    tr td:last-child()
    {
        float: right;
    }

</style>

</head>

<body>

@include('pages.template.header')

<main class="producto">

    <nav style="background-color: #122C78;">

        <div class="container">

            <div class="row">

                <div class="col-sm-6">

                    <ol class="breadcrumb" style="background-color: #122C78; margin-bottom: 20px; margin-top: 20px; ">

                        <li><a href="{{route('productos')}}" style="color:white; font-size: 25px;">PRODUCTOS ></a></li>

                        <li style="color:white; font-size: 25px; text-transform: uppercase;">{{$producto->nombre}}</li>

                    </ol>

                </div>

                <div class="col-sm-6">

                        <div class="form-group" style="padding-top: 28px;">

                        <input class="pull-right" type="search" style="border-radius: 20px; border:none; background-color: #EEEEEE; height: 26px; width: 375px; outline: none; padding: 5px 10px;">

                        <label class="pull-right" for="" style="color:white; font-weight: lighter; margin-right: 20px; text-transform: initial; font-size: 16px; margin-top: 5px;">Buscar</label>

                        </div>

                </div>

            </div>

        </div>

    </nav>





{{-- Barra lateral --}}





    <div class="container" style="margin-top: 70px;">

        <div class="row">

            <div class="col-sm-3">

                <div class="wrapper">

                    <nav id="sidebar">

                        <!-- Sidebar Links -->

                        <ul class="list-unstyled components">

                            <li><!-- Link with dropdown items -->

                                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" style="color:#003279; font-size: 18px; font-weight: bold;width: 100%;">CATEGORÍAS <i class="glyphicon glyphicon-chevron-down pull-right"></i></a>

                                <div style="width: 100%; height: 2px; background-color:#003279; "></div>

                                <ul class="collapse list-unstyled" id="homeSubmenu">

                                    @foreach($categorias as $categoria)

                                        <li class="hover" style="padding: 10px 0;">

                                            <a href="{{route('categoria',$categoria->id)}}" style="color:black; font-size: 15px; text-transform: uppercase;">{{$categoria->nombre}}</a>

                                        </li>

                                    @endforeach

                                </ul>

                            </li>

                        </ul>

                    </nav>

                </div>

                <div class="wrapper">

                    <nav id="sidebar">

                        <!-- Sidebar Links -->

                        <ul class="list-unstyled components">

                            <li style="margin-top: 40px;"><!-- Link with dropdown items -->

                                <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" style="color:#003279; font-size: 18px; font-weight: bold;width: 100%;">MARCAS <i class="glyphicon glyphicon-chevron-down pull-right"></i></a>

                                <div style="width: 100%; height: 2px; background-color:#003279; "></div>

                                <ul class="collapse list-unstyled" id="homeSubmenu2">

                                    @foreach($marcas as $marca)

                                        <li class="hover" style="padding: 10px 0;">

                                            <a href="{{ route('marca',$marca->id)}}" style="color:black; font-size: 15px; text-transform: uppercase;">{{$marca->nombre}}</a>

                                        </li>

                                    @endforeach

                                </ul>

                            </li>

                        </ul>

                    </nav>

                </div>

            </div>

            <div class="col-sm-9">

                <div class="row">

                    <div class="col-sm-6">

                        <div class="col-sm-12">

                            <img class="img-responsive" id="imgDisp" src="{{ asset($producto->imagen)}}" style="border:1px solid #AAAAAA; width: 95%; height:334px; ">

                        </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="row">
                                        @if($producto->imagen)
                                            <div class="col-sm-2" style="width: 74px; height: 72px; margin-top: 5px; padding: 0 2px;">

                                                <img id="imgName" onclick="changeImage('{{ asset($producto->imagen)}}')" src="{{ asset($producto->imagen)}}" style="width: 100%;border:1px solid #AAAAAA;">

                                            </div>
                                        @endif
                                         @if($producto->imagen1)
                                            <div class="col-sm-2" style="width: 72px; height: 72px; margin-top: 5px; padding: 0 2px;">

                                                <img id="imgName" onclick="changeImage('{{ asset($producto->imagen1)}}')" src="{{ asset($producto->imagen1)}}" style="width: 100%;border:1px solid #AAAAAA;">

                                            </div>
                                        @endif
                                        @if($producto->imagen2)
                                            <div class="col-sm-2" style="width: 72px; height: 72px; margin-top: 5px; padding: 0 2px;">

                                                <img id="imgName" onclick="changeImage('{{ asset($producto->imagen2)}}')" src="{{ asset($producto->imagen2)}}" style="width: 100%;border:1px solid #AAAAAA;">

                                            </div>
                                        @endif
                                        @if($producto->imagen3)
                                            <div class="col-sm-2" style="width: 72px; height: 72px; margin-top: 5px; padding: 0 2px;">

                                                <img id="imgName" onclick="changeImage('{{ asset($producto->imagen3)}}')" src="{{ asset($producto->imagen3)}}" style="width: 100%;border:1px solid #AAAAAA;">

                                            </div>
                                        @endif
                                        @if($producto->imagen4)
                                            <div class="col-sm-2" style="width: 72px; height: 72px; margin-top: 5px; padding: 0 2px;">

                                                <img id="imgName" onclick="changeImage('{{ asset($producto->imagen4)}}')" src="{{ asset($producto->imagen4)}}" style="width: 100%;border:1px solid #AAAAAA;">

                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>


            </div>

        </div>

    </div>

</main>




<script src="http://code.jquery.com/jquery-latest.min.js"></script> <!-- llamado a jQuery -->

<script src="js/bootstrap.min.js"></script> <!-- llamado a js de BOOTSTRAP que trabaja con Jquery es por eso que se pone debajo del jQuery.js -->

<script type="text/javascript">
    function changeImage(imgName)
        {
            image = document.getElementById('imgDisp');
            image.src = imgName;
        }
</script>
</body>



</html>