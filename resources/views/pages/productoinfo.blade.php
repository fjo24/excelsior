@extends('pages.templates.body')
@section('title', 'Excelsior - Categorias')
@section('css')
<link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container" style="width: 123%;">
  
    <div class="p_info">   
        <div style="margin: 4% 55px 35px 60px;">
          <div class="row">
            <div class="links col l12 s12 m12">
              <h7>
                <a href="/categorias" style="color: gray; padding-left: 75px;">productos • </a>
                <a href="{{ route('productos', $categoria->id)}}" style= "color: gray;text-transform: lowercase">{!!$categoria->nombre !!} • </a>
                <a href="" style="color: gray";>{!!$producto->nombre !!}</a>
              </h7>
            </div>
              <div class="col l12 s12 m12">
                <div class="producto">
                  <div class="row" style="">
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 floatInherit slider-detalle">
                        <div class="slider hide-on-med-and-down" style="" >
                          <ul class="slides" style="background-color: white">
                             @foreach($producto->imagenes as $img)
                           <li>
                              <img src="{{asset($img->ubicacion)}}" style="width: 100%; height: 100%;">
                           </li>
                          @endforeach
                          </ul>
                       </div> 


                    </div>
                    <div class="infop">
                      <div class="col l6 s12" >
                          <p style="font-size: 39px; font-weight: bold; color: #858585!important;">{!! $producto->nombre !!}</p><br>
                          <p style="font-family: 'Source Sans Pro', sans-serif!important;">{!! $producto->texto_principal !!}</p><br>
                          <p style="font-family: 'Source Sans Pro', sans-serif!important;">{!! $producto->titulo1 !!}</p>
                          <p style="font-family: 'Source Sans Pro', sans-serif!important;">{!! $producto->contenido1 !!}</p><br>
                          <p style="font-family: 'Source Sans Pro', sans-serif!important;">{!! $producto->titulo2 !!}</p>
                          <p style="font-family: 'Source Sans Pro', sans-serif!important;">{!! $producto->contenido2 !!}</p>
                      </div>
                    </div>

                  </div>
                </div>
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
        height: 574,
        width: 590
        
    });
  
</script>
@endsection