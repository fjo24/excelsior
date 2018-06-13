@extends('pages.templates.body')
@section('title', 'Excelsior - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/servicios.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/mantenimiento.css') }}" rel="stylesheet"/>

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
      <div class="col l4 s12 hide-on-med-and-down" >
        <img class="responsive-img" style="width: 470px; height: 419px" src="{!! $contenido->imagen !!}">
      </div>
      <br>
      <div class="col l4 s12">
          <p>{!! $contenido->titulo !!}</p>
          <hr>
          <p style="padding:  5px">{!! $contenido->contenido !!}</p>
          <p >{!! $contenido->contenido2 !!}</p>
          
      </div>
      <div class="col l4 s12">
          <p>{!! $contenido->titulo !!}</p>
          <hr>
          <p style="padding:  5px">{!! $contenido->contenido !!}</p>
          <p >{!! $contenido->contenido2 !!}</p>
          
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
