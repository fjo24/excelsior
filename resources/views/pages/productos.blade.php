@extends('pages.templates.body')
@section('title', 'Excelsior - Categorias')
@section('css')
<link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container" style="width: 85%">
    <div class="productos">
        <div style="">
            <div class="row center">
                <span class="titulo-pro">
                    Productos | <a href="{{ url('categorias')}}" style= "color:#ff0000;">{!! $categoria->nombre !!}</a>
                </span>
                <hr class="pro-line"/>
                <div class="items-pro col l12 s12 m12">
                    @foreach($productos as $producto)
                    <div class="col l4 s12 m4">
                        <div class="div-producto">
                            <a href="{{ route('productoinfo', $producto->id)}}">
                                @foreach($producto->imagenes as $imagen)
                                        <img alt="" class="img-pro responsive-img" src="{{asset($imagen->ubicacion)}}"/>
                                        @if($ready == 0)    
                                        @break;
                                    @endif
                                    @endforeach
                                
                                <hr align="left">
                                    <div class="div-nombre">
                                        {!!$producto->nombre !!}
                                    </div>
                                </hr>
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
