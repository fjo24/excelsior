@extends('pages.templates.body')
@section('title', 'Excelsior - Categorias')
@section('css')
<link href="{{ asset('css/pages/categoriaobras.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container" style="width: 85%">
    <div class="productos">
        <div style="">
            <div class="row center bloquecont">
                <span class="titulo-cat">
                    Obras
                </span>
                <hr class="cat-line"/>
                <div class="items-cat col l12 s12 m12">
                    @foreach($obras as $categoria)
                    <div class="bloquecard col l6 s12 m6 center">
                        <div class="div-categoria card z-depth-0">
                            <div class="card-image center-align">
                                <a class="naranja fs20 mayus" href="{{ route('obras', $categoria->id)}}">
                                    <div class="efecto">
                                        <span class="central">
                                            <i class="material-icons">
                                                add
                                            </i>
                                        </span>
                                    </div>
                                    <img src="{{asset($categoria->imagen)}}" style="">
                                    </img>
                                </a>
                            </div>
                            <div class="div-nombre">
                                <p class="texto center">
                                    <div class="l12 m12 s12 titulo-catobra">
                                        {!!$categoria->titulo !!}
                                    </div>
                                    <div class="l12 m12 s12" style="font-size: 14px;">
                                        {!!$categoria->texto !!}
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
</script>
@endsection
