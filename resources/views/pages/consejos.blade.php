@extends('pages.templates.body')
@section('title', 'Excelsior - Consejos de Seguridad')
@section('css')
<link href="{{ asset('css/pages/consejos.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<?php
        $i=0;
    ?>
<div class="container" style="width: 85%">
    <div class="productos">
        <div style="">
            <div class="row bloquecont center">
                <span class="titulo-cat">
                    Consejos de Seguridad
                </span>
                <hr class="cat-line"/>
                <div class="items-cat col l12 s12 m12">
                    <p class="texto-ini">
                        En materia de seguridad se busca permanentemente cumplir con los más altos coeficientes. Es por eso que biendamos los siguientes consejos.
                    </p>
                </div>
                <div class="servicios" style="align-items: center">
                    <div class="items-servicio row" style="align-items: center;">
                        <div class="col l12 s12 m12">
                            @foreach($consejos as $consejo)
                            @if($i===0)
                            <div class="bloque-consejos left">
                                <div class="col l6 s12 m6 center">
                                    <img alt="" src="{{asset($consejo->imagen)}}" style="">
                                    </img>
                                </div>
                                <div class="texto col l6 s12 m6">
                                    <div class="titulo">
                                        {!! $consejo->titulo !!}
                                    </div>
                                    <div class="texto1">
                                        {!! $consejo->texto1 !!}
                                    </div>
                                    <div class="texto2">
                                        {!! $consejo->texto2 !!}
                                    </div>
                                </div>
                            </div>
                            <?php
                                $i++;
                            ?>
                            @else
                            <div class="bloque-consejos left">
                                <div class="texto col l6 s12 m6">
                                    <div class="titulo">
                                        {!! $consejo->titulo !!}
                                    </div>
                                    <div class="texto1">
                                        {!! $consejo->texto1 !!}
                                    </div>
                                    <div class="texto2">
                                        {!! $consejo->texto2 !!}
                                    </div>
                                </div>
                                <div class="col l6 s12 m6 center">
                                    <img alt="" src="{{asset($consejo->imagen)}}" style="">
                                    </img>
                                </div>
                            </div>
                            <?php
        $i=0;
    ?>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
