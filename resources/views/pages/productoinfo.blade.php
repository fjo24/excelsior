@extends('pages.templates.body')
@section('title', 'Excelsior - Producto')
@section('css')
<link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container" style="width: 123%;">
    <div class="p_info">
        <div style="margin: 4% 85px 35px 85px;">
            <div class="row">
                <div class="links col l12 s12 m12 center" style="margin-bottom: 50px;">
                    <span class="titulo-pro">
                        Productos |
                        <a href="{{ url('categorias')}}" style="color:#ff0000;">
                            {!! $categoria->nombre !!}
                        </a>
                        | {!!$producto->nombre !!}
                    </span>
                    <hr class="pro-line" style="width: 102px!important;height: 2px!important;">
                    </hr>
                </div>
                <div class="col l12 s12 m12">
                    <div class="producto">
                        <div class="row" style="">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 floatInherit slider-detalle">
                                <div class="slider hide-on-med-and-down" style="">
                                    <ul class="slides" style="background-color: white">
                                        @foreach($producto->imagenes as $img)
                                        <li>
                                            <img src="{{asset($img->ubicacion)}}" style="width: 100%; height: 100%;">
                                            </img>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <span class="contenido-info l11">
                                    {!!$producto->contenido!!}
                                </span>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 right" style="position: relative;
    bottom: 15px;">
                                 <a href="{{ url('presupuesto')}}">
                                    <button class="btn btn-default right" id="botonEstadoAnterior" style="background-color: white!important; border:2px solid #FF0000;color: #FF0000; margin: 0px 5px;" type="button">
                                        CONSULTAR POR PRODUCTO
                                    </button>
                                    </a>
                                    <a href="{{ route('file-pdf2', ['post' => $producto->id])}}">
                                        <button class="btn btn-default right" href="" style="background-color: #FF0000;">
                                            <img src="{{asset('img/download.png')}}" style="width: 19px; height: 20px;position: relative;top: 5px;right: 5px;">
                                            </img>
                                            FICHA TÉCNICA
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('js')
    <script type="text/javascript">
        $('.slider').slider({
        indicators: true,
        height: 729,
        width: 1160
        
    });
    </script>
    @endsection
</div>