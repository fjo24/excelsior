@extends('pages.templates.body')
@section('title', 'Excelsior - Obras')
@section('css')
<link href="{{ asset('css/pages/obras.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="container" style="width: 85%">
    <div class="productos">
        <div style="">
            <div class="row center bloquecont">
                <span class="titulo-cat">
                    Obras |
                    <a href="{{ url('categoriaobras')}}" style="color:#ff0000;">
                        {!! $categoria->nombre !!}
                    </a>
                </span>
                <hr class="cat-line"/>
                <div class="items-cat col l12 s12 m12">
                    @foreach($obras as $obra)
                    <div class="bloquecard col l6 s12 m6 center">
                        <div class="div-categoria card z-depth-0">
                            <div class="card-image center-align">
                                <a class="naranja fs20 mayus modal-trigger" href="{{'#modal'.$obra->id}}">
                                    <div class="efecto">
                                        <span class="central">
                                            <i class="material-icons">
                                                add
                                            </i>
                                        </span>
                                    </div>
                                    @foreach($obra->imagenes as $imagen)
                                    <img alt="" class="img-pro responsive-img" src="{{asset($imagen->imagen)}}"/>
                                    @if($ready == 0)    
                                        @break;
                                    @endif
                                    @endforeach
                                </a>
                            </div>
                            <div class="div-nombre">
                                <p class="texto center">
                                    <div class="l12 m12 s12 titulo-catobra">
                                        {!!$obra->titulo !!}
                                    </div>
                                    <div class="l12 m12 s12 subtitulo" style="font-size: 14px;">
                                        {!!$obra->subtitulo !!}
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach



    <div class="row" style="margin: 5% 10%;">

        @foreach($obras as $obra)


            <!-- Modal Structure -->

            <div id="{{'modal'.$obra->id}}" class="modal cont-ser" style="background-color: #454C53;">

              <div class="modal-content" style="padding: 10%;">
                <h4 style="color: #2096F2; font-family: 'Source Sans Pro', sans-serif; font-size: 20px; text-align: center; font-weight:600; margin-bottom: 2%;">{{$obra->titulo}}</h4>
                <div class="row">
                  <div class="col s12" style="padding-left: 0px;">
               
                    @foreach($obra->imagenes as $imagen)
                    <div class="cont-img">
                        <img alt="" class="img-pro responsive-img" id="producto" src="{{asset($imagen->imagen)}}"/>
                        @if($ready == 0)    
                            @break;
                        @endif
                    </div>
                    @endforeach
            
                  </div>
                </div>
                <div class="row">
                    @foreach($obra->imagenes as $imagen)
                    <div class="col s4" style="padding-left: 0px;">
                        <div class="cont-img">
                            <img alt="" class="img-pro responsive-img" src="{{asset($imagen->imagen)}}" onclick="actualizar('{{asset($imagen->imagen)}}')"/>
                        </div>
                    </div>
                    @endforeach

                </div>
                

                <p>{!! $obra->tarea !!}</p>

              </div>

            </div>

        @endforeach

    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function actualizar(imagen){
      document.getElementById('producto').src = imagen;
    }
  </script>
<script>
  $(document).ready(function(){
    $('.modal').modal();
  }); 
</script>
@endsection




galeria



@extends('pages.templates.cuerpo')
@section('titulo','Portones')
@section('estilo')
    <link rel="stylesheet" href="{{ asset('css/page/servicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/slider.css') }}">
@endsection
@section('paginas')



<div class="container-fluid">

    <div class="row" style="margin: 0px;">

        <div id="carousel" class="carousel carousel-slider center" data-indicators="true"  style="position: relative;">

             @foreach($sliders as $slider)

                <div class="carousel-item white-text" href="" style="position: absolute;">

                  <img src="{{asset($slider->imagen)}}" alt="">

                  @if($slider->titulo)

                    <div class="cont-titulos">

                        <div>

                            <div class="titulo-slider ">{!!$slider->titulo !!}</div>

                            <div class="subtitulo-slider ">{!!$slider->subtitulo !!}</div>

                        </div>

                    </div>

                   @endif

                </div>

            @endforeach

        </div>

    </div>

    <div class="container-fluid" style="background-color: rgb(69,76,83,0.10);">

      <div class="row" style="margin: 0px; padding: 5%;">

        <h4 style="margin: 0px;" class="titulo-porton">{{$porton->titulo}}</h4>

        <p class="contenido-porton">{{$porton->contenido}}</p>

      </div>

    </div>

    <div class="row" style="margin: 5% 10%;">

        @foreach($servicios as $servicio)

            <section class="col s12 m6 l4">

                <a class="modal-trigger" href="{{'#modal'.$servicio->id}}">

                    <img src="{{asset($servicio->imagen)}}" class="responsive-img" alt="">

                </a>

            </section>

            <!-- Modal Structure -->

            <div id="{{'modal'.$servicio->id}}" class="modal cont-ser" style="background-color: #454C53;">

              <div class="modal-content" style="padding: 10%;">
                <h4 style="color: #2096F2; font-family: 'Source Sans Pro', sans-serif; font-size: 20px; text-align: center; font-weight:600; margin-bottom: 2%;">{{$servicio->titulo}}</h4>
                <div class="row">
                  <div class="col s12" style="padding-left: 0px;">
                    <?php $i=0; ?>
                    @foreach($imagenes as $imagen)
                        @if($imagen->id_servicios == $servicio->id)
                          @if($i==0)
                          <div class="cont-img">
                            <img class="responsive-img" id="producto" src="{{asset($imagen->imagen)}}" alt="">
                            <?php $i++; ?>
                          </div>
                          @endif
                        @endif
                    @endforeach
                  </div>
                </div>
                <div class="row">
                  @foreach($imagenes as $imagen)
                    @if($imagen->id_servicios == $servicio->id)
                    <div class="col s4 m2"  style="padding-left: 0px;">
                        <div class="cont-img">
                          <img class="responsive-img" src="{{asset($imagen->imagen)}}" alt="" onclick="actualizar('{{asset($imagen->imagen)}}')">
                        </div>
                    </div>
                    @endif
                  @endforeach
                </div>
                

                <p>{!! $servicio->contenido !!}</p>

              </div>

            </div>

        @endforeach

    </div>

</div>


<script>
    function actualizar(imagen){
      document.getElementById('producto').src = imagen;
    }
  </script>
<script>
  $(document).ready(function(){
    $('.modal').modal();
  }); 
</script>



@endsection
