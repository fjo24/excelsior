@extends('adm.layouts.frame')

@section('titulo', 'Categoria de productos')

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
    <div class="col s12">
        {!!Form::model($consejo, ['route'=>['consejos.update',$consejo->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l12 s12">
                {!!Form::label('Titulo:')!!}
                        {!!Form::text('titulo', null , ['class'=>'', 'required'])!!}
            </div>
            <label class="col l12 s12" for="texto1">
                Primer texto
            </label>
            <div class="input-field col l12 s12">
                <textarea class="materialize-textarea" id="texto1" name="texto1" required="">
                    {!! $consejo->texto1 !!}
                </textarea>
            </div>
            <label class="col l12 s12" for="texto2">
                Segundo texto
            </label>
            <div class="input-field col l12 s12">
                <textarea class="materialize-textarea" id="texto2" name="texto2" required="">
                    {!! $consejo->texto2 !!}
                </textarea>
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', 'required'])!!}
            </div>
            <div class="file-field input-field col l6 s12">
                <div class="btn">
                    <span>
                        Imagen
                    </span>
                    {!! Form::file('imagen') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('imagen',null, ['class'=>'file-path']) !!}
                </div>
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="btn-large waves-effect waves-light red right" name="action" type="submit">
                Editar
                <i class="material-icons right">
                    send
                </i>
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('texto1');
    CKEDITOR.replace('texto2');
    CKEDITOR.config.height = '100px';
    CKEDITOR.config.width = '100%';
</script>
@endsection