@extends('pages.templates.body')
@section('title', 'Tolosa - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet">
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
<div class="container">
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
