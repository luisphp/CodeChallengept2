<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
</head>
<body>



	<div class="container">
		<div class="col-md-12">

			<h2 > Next Bigger </h2>

			<br>


			{!! Form::open(['route'=>'nextbigger.store']) !!}

								
					<div class="container">

						<!-- Numero -->
						<div class="form-group">
							{{ Form::label('numero', 'Numero') }}
							{{ Form::text('numero', null , ['class' => 'form-control col-md-3', 'id'=>'numero']) }}
						</div>


						<!-- Boton para enviar el numero -->
						<div>
							{{ Form::submit('Enviar', ['class' => 'btn btn-sm btn-primary']) }}
						</div>


					</div>


			{!! Form::close() !!}

			<br>

			

			

			
	</div>

</div>
						    
			

</body>
</html>