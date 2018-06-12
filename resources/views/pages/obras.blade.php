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
                                <a class="naranja fs20 mayus modal-trigger" href="#modal{!!$obra->id !!}">
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

                    @foreach($obras as $obra)
                    <!-- Modal Structure -->
                    <div class="modal modal-fixed-footer" id="modal{!!$obra->id !!}">
                        <div class="modal-content">
                            <div class="col l12">
                                @foreach($obra->imagenes as $imagen)
                                <div class="col-sm-12">
                                    <img id="imgName" onclick="changeImage('{{asset($imagen->imagen)}}')" src="{{asset($imagen->imagen)}}" style="width: 100%;border:1px solid #AAAAAA;">
                                                </img>
                                </div>
                                @if($ready == 0)    
                                        @break;
                                    @endif
                                @endforeach
                                <div class="col-sm-12">
                                    <div class="col-sm-12">
                                        <div class="row">
                                        @foreach($obra->imagenes as $imagen)
                                <div class="col-sm-2" style="width: 74px; height: 72px; margin-top: 5px; padding: 0 2px;">
                                                <img id="imgName" onclick="changeImage('{{asset($imagen->imagen)}}')" src="{{asset($imagen->imagen)}}" style="width: 100%;border:1px solid #AAAAAA;">
                                                </img>
                                            </div>
                             
                                @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="modal-close waves-effect waves-green btn-flat" href="#!">
                                Agree
                            </a>
                        </div>
                    </div>
                    <script type="text/javascript">
    function changeImage(imgName)
        {
            image = document.getElementById('imgDisp');
            image.src = imgName;
        }

        $(document).ready(function(){
    $('.modal').modal();
  });
</script>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
