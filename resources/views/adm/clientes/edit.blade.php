@extends('adm.layouts.frame')

@section('titulo', 'Editar Cliente')

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
			{!!Form::model($cliente, ['route'=>['clientes.update',$cliente->id], 'method'=>'PUT', 'files' => true])!!}
				<div class="row">
					<div class="input-field col l6 s12">
						{!!Form::label('nombre:')!!}
						{!!Form::text('nombre', null , ['class'=>''])!!}
					</div>
					<div class="input-field col l6 s12">
						{!!Form::label('link:')!!}
						{!!Form::text('link', null , ['class'=>''])!!}
					</div>
					<div class="file-field input-field col l6 s12">
						<div class="btn">
						    <span>Imagen</span>
						    {!! Form::file('imagen') !!}
						</div>
						<div class="file-path-wrapper">
						    {!! Form::text('imagen',null, ['class'=>'file-path ']) !!}
						</div>
					</div>
				</div>
				<div class="enviar col s12 no-padding">
					{!!Form::submit('Crear', ['class'=>'waves-effect waves-light red btn-large right'])!!}
				</div>
			{!!Form::close()!!} 
			</div>
		</div>
@endsection
@section('js')
<script type="text/javascript">
	
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection