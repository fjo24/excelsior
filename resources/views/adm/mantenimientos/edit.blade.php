@extends('adm.layouts.frame')

@section('titulo', 'Editar Destacado\Mantenimiento')

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
			{!!Form::model($dato, ['route'=>['mantenimientos.update',$dato->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="input-field col l6 m6 s12">
						{!!Form::label('Link :')!!}
						{!!Form::text('link',$dato->link,['class'=>''])!!}
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
				    <label class="col l12 s12" for="parrafo">Contenido</label>
				    <div class="input-field col s12">
				        <textarea id="contenido" name="contenido" class="materialize-textarea" required>{{$dato->contenido}}</textarea>
				    </div>
				</div>
				<div class="col s12 no-padding">
					{!!Form::submit('Guardar', ['class'=>'waves-effect waves-light red btn-large right'])!!}
				</div>
			{!!Form::close()!!} 
			</div>
			</div>

<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('titulo');
	CKEDITOR.replace('contenido');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';
</script>
@endsection