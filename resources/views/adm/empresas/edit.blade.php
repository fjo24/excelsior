@extends('adm.layouts.frame')

@section('titulo', 'Editar Destacado\Empresas')

@section('contenido')
	    @if(count($errors) > 0)
		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
	  		<ul>
	  			@foreach($errors->all() as $error)
	  				<li>{!!$error!!}</li>
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
			{!!Form::model($dato, ['route'=>['empresas.update',$dato->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="input-field col l6 m6 s12">
						{!!Form::label('Link :')!!}
						{!!Form::text('link',$dato->link,['class'=>''])!!}
					</div>
					<div class="input-field col l6 m6 s12">
						{!!Form::label('Video :')!!}
						{!!Form::text('video',$dato->video,['class'=>''])!!}
					</div>
					<div class="file-field input-field col l6 m6 s12">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen',null, ['class'=>'file-path']) !!}
						</div>
					</div>
					<label class="col l12 s12" for="parrafo">Titulo</label>
					<div class="input-field col s12">
				        <textarea id="titulo" name="titulo" class="materialize-textarea" required>{{$dato->titulo}}</textarea>
				    </div>
				    <label class="col l12 s12" for="parrafo">Subtitulo</label>
					<div class="input-field col s12">
				        <textarea id="subtitulo" name="subtitulo" class="materialize-textarea" required>{{$dato->subtitulo}}</textarea>
				    </div>
				    <label class="col l12 s12" for="parrafo">Contenido</label>
				    <div class="input-field col s12">
				        <textarea id="contenido" name="contenido" class="materialize-textarea" required>{{$dato->contenido}}</textarea>
				    </div>
				    <label class="col l12 s12" for="parrafo">Segundo Titulo</label>
					<div class="input-field col s12">
				        <textarea id="titulo2" name="titulo2" class="materialize-textarea" required>{{$dato->titulo2}}</textarea>
				    </div>
				    <label class="col l12 s12" for="parrafo">Segundo Subtitulo</label>
					<div class="input-field col s12">
				        <textarea id="subtitulo2" name="subtitulo2" class="materialize-textarea" required>{{$dato->subtitulo2}}</textarea>
				    </div>
				    <label class="col l12 s12" for="parrafo">Segundo Contenido</label>
				    <div class="input-field col s12">
				        <textarea id="contenido2" name="contenido2" class="materialize-textarea" required>{{$dato->contenido2}}</textarea>
				    </div>
				</div>
				<button class="btn-large waves-effect waves-light red right" name="action" type="submit">
                        Guardar
                        <i class="material-icons right">
                            send
                        </i>
                    </button>
			{!!Form::close()!!} 
			</div>
			</div>

<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('titulo');
	CKEDITOR.replace('subtitulo');
	CKEDITOR.replace('contenido');
	CKEDITOR.replace('titulo2');
	CKEDITOR.replace('subtitulo2');
	CKEDITOR.replace('contenido2');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';
</script>
@endsection