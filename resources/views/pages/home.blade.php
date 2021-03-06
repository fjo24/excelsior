@extends('pages.templates.body')
@section('title', 'Excelsior - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/servicios.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="slider hide-on-med-and-down">
    <ul class="slides ">
        @foreach($sliders as $slider)
        <li>
            <img src="{{asset($slider->imagen)}}">
                <div class="caption box-cap" style="">
                    <div style="">
                        <span class="slidertext1">
                            {!! $slider->texto !!}
                        </span>
                        <span class="slidertext2">
                            {!! $slider->texto2 !!}
                        </span>
                    </div>
                </div>
            </img>
        </li>
        @endforeach
    </ul>
</div>
<div class="container" style="width: 89%;">
    <div class="servicios center" style="align-items: center">
        <span class="titulo-servicio">
            Mantenimiento
        </span>
        <hr class="mtto-line">
            <div class="items-servicio row" style="align-items: center;">
                <div class="col l12 s12 m12">
                    @foreach($servicios as $servicio)
                    <div class="col l2 s12 m6" style="margin: 0px 19px;">
                        <span class="img-servicio" style="">
                            <img alt="" src="{{asset($servicio->imagen)}}" style="">
                            </img>
                            <div class="texto-servicio">
                                <p>
                                    {!! $servicio->texto !!}
                                </p>
                            </div>
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </hr>
    </div>
</div>
<div class="seccion-banner" style="background-image: {!! $banner->imagen !!}">
    <div class="btexto">
        <div class="tbanner center">
            <p>
                {!! $banner->texto !!}
            </p>
        </div>
        <div class="tbanner2 center">
            <p>
                {!! $banner->texto2 !!}
            </p>
        </div>
        <div class="tbanner3 center">
            <p>
                {!! $banner->texto3 !!}
            </p>
        </div>
    </div>
</div>
<div class="container" style="width: 84%;">
    <div class="destacado-home">
        <div class="row" style="">
            <div class="col l6 s12 hide-on-med-and-down">
                <img class="img-destacado responsive-img" src="{!! $contenido->imagen !!}" style="">
                </img>
            </div>
            <div class="dest-text col l6 s12">
                <div class="tit-dest">
                    {!! $contenido->titulo !!}
                </div>
                <hr class="dest-line">
                <div class="subtit-dest">
                    {!! $contenido->subtitulo !!}
                </div>
                <div class="cont-dest">
                    {!! $contenido->contenido !!}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cont-btn">
                    <a href="{!! $contenido->link !!}">
                    <button type="button" class="boton btn btn-default pull-right">Conocé mas</button>
                </a>
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
        height: 511,
    });
</script>
@endsection
