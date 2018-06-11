@extends('pages.templates.body')
@section('title', 'Excelsior - Categorias')
@section('css')
<link href="{{ asset('css/pages/categorias.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container" style="width: 86%">
    <div class="categorias">
        <div style="">
            <div class="row center">
                <span class="titulo-cat">
                    Productos
                </span>
                <hr class="cat-line"/>
                <div class="items-cat col l12 s12 m12">
                    @foreach($categorias as $categoria)
                    <div class="bloquecard col l4 s12 m4 center">
                        <div class="div-categoria card z-depth-0">
                            <div class="card-image center-align">
                                <a class="naranja fs20 mayus" href="{{ route('productos', $categoria->id)}}">
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
                                <p class="texto">
                                    {!!$categoria->nombre !!}
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
