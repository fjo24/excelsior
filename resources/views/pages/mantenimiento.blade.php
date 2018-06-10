@extends('pages.templates.body')
@section('title', 'Tolosa - Home')
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
                    <div class="col l3 s12 m6">
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
<div class="container" style="width: 84%;">
    <div class="destacado-home">
        <div class="row" style="">
            <div class="col l6 s12 hide-on-med-and-down">
                <img class="img-destacado responsive-img" src="{!! $contenido->imagen !!}" style="">
                </img>
            </div>
            <div class="col l6 s12">
                <p>
                    {!! $contenido->titulo !!}
                </p>
                <hr class="dest-line">
                <p>
                    {!! $contenido->subtitulo !!}
                </p>
                <p>
                    {!! $contenido->contenido !!}
                </p>
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
