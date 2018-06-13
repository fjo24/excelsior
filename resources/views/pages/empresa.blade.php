@extends('pages.templates.body')
@section('title', 'Excelsior - Empresa')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/empresa.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="slider hide-on-med-and-down">
    <ul class="slides ">
        @foreach($sliders as $slider)
        <li>
            <img src="{{asset($slider->imagen)}}"/>
            @if(isset($slider->texto)||isset($slider->texto2))
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
            @endif
        </li>
        @endforeach
    </ul>
</div>
<div class="container" style="width: 93%;">
    <div class="empresa">
        <div class="row" style="">
            <div class="img-empresa col l4 s12 hide-on-med-and-down">
                <img class="responsive-img" src="{!! $contenido->imagen !!}" style="width: 357px; height: 492px">
                </img>
            </div>
            <br>
                <div class="col l4 s12">
                    {!! $contenido->titulo !!}
                    <hr class="empresa-line left"/>
                    <br>
                        <div class="subt-empresa left" style="width: 100%">
                            {!! $contenido->subtitulo !!}
                        </div>
                        <div class="cont-empresa">
                            <p style="padding:  5px; word-spacing: 7px;">
                                {!! $contenido->contenido !!}
                            </p>
                        </div>
                    </br>
                </div>
                <div class="col l4 s12">
                    <hr class="empresa-linea1 left"/>
                    <div class="tit-empresa2 left" style="width: 100%">
                        {!! $contenido->titulo2 !!}
                    </div>
                    <hr class="empresa-linea2 left"/>
                    <br>
                        <div class="subt-empresa2 left" style="width: 100%">
                            {!! $contenido->subtitulo2 !!}
                        </div>
                        <div class="cont-empresa2 left" style="width: 100%">
                            <p style="padding:  5px; word-spacing: 7px;">
                                {!! $contenido->contenido2 !!}
                            </p>
                        </div>
                    </br>
                </div>
            </br>
        </div>
    </div>
</div>
<div class="video">
    <div class="container" style="width: 70%;">
        <div class="row" style="">
            <div class="video-container">
                <div class="video-container">
        <iframe width="853" height="480" src="{!! $contenido->video !!}" frameborder="0" allowfullscreen></iframe>
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
