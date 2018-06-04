@extends('adm.layouts.frame')

@section('titulo', 'Editar Banner\Home')

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
			{!!Form::model($banner, ['route'=>['bannerupdate',$banner->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="file-field input-field col l6 m6 s12">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen',null, ['class'=>'file-path']) !!}
						</div>
					</div>
					<label class="col l12 s12" for="parrafo">Linea 1</label>
					<div class="input-field col s12">
				        <textarea id="texto" name="texto" class="materialize-textarea" required>{{$banner->texto}}</textarea>
				    </div>
				    <label class="col l12 s12" for="parrafo">Linea 2</label>
					<div class="input-field col s12">
				        <textarea id="texto2" name="texto2" class="materialize-textarea" required>{{$banner->texto2}}</textarea>
				    </div>
				    <label class="col l12 s12" for="parrafo">Linea 3</label>
				    <div class="input-field col s12">
				        <textarea id="texto3" name="texto3" class="materialize-textarea" required>{{$banner->texto3}}</textarea>
				    </div>
				</div>
				<div class="col s12 no-padding">
					{!!Form::submit('Guardar', ['class'=>'waves-effect waves-light btn right'])!!}
				</div>
			{!!Form::close()!!} 
			</div>
			</div>

<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('texto');
	CKEDITOR.replace('texto2');
	CKEDITOR.replace('texto3');
	CKEDITOR.config.height = '100px';
	CKEDITOR.config.width = '100%';
</script>
@endsection