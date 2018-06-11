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
                    <div class="col l4 s12 m4">
                        <div class="div-categoria">
                            <a href="{{ route('productos', $categoria->id)}}">
                                <img alt="" class="img-cat responsive-img" src="{{asset($categoria->imagen)}}"/>
                                <div class="div-nombre">
                                    <p class="texto">
                                        {!!$categoria->nombre !!}
                                    </p>
                                </div>
                            </a>
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
