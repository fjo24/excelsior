@extends('adm.layouts.frame')

@section('titulo', 'Nuevo producto')

@section('contenido')
        @if(count($errors) > 0)
<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {!!$error!!}
        </li>
        @endforeach
    </ul>
</div>
@endif
        @if(session('success'))
<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col l12 s12">
        {!!Form::open(['route'=>'productos.store', 'method'=>'POST', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
                        {!!Form::text('nombre', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Categoria']) !!}
            </div>
        </div>
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', ''])!!}
            </div>
        <div class="file-field input-field col l6 s12">
            <div class="btn">
                <span>
                    Ficha tecnica
                </span>
                {!! Form::file('ficha') !!}
            </div>
            <div class="file-path-wrapper">
                {!! Form::text('ficha',null, ['class'=>'file-path']) !!}
            </div>
        </div>
        </div>
       
                    <div class="file-field input-field col l12 s12">
                        <div class="btn col l4 s12">
                            <input multiple="true" name="file[]" type="file">
                                {!!Form::label('Agregue imagenes:')!!}
                            </input>
                        </div>
                        <div class="file-path-wrapper">
                {!! Form::text('file',null, ['class'=>'file-path']) !!}
            </div>
                    </div>
                
        <label class="col l12 s12" for="contenido">
            Contenido
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="contenido" name="contenido" required="">
            </textarea>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="btn-large waves-effect waves-light red right" name="action" type="submit">
                Crear
                <i class="material-icons right">
                    send
                </i>
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
@endsection
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('contenido');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
    
$(document).ready(function(){
    $('select').formSelect();
  });

</script>
@endsection
