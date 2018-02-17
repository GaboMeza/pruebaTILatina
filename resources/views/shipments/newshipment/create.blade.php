@extends ('layouts.admin') <!-- Extender de la plantilla admin.blade.php--> 
@section ('contenido') <!-- indicarle la sección donde se mostrara--> 
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>New shipment</h3>
			@if (count($errors)>0) <!-- si hay un error lo mostrara en forma de lista-->
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

	<!--Formulario para crear nuevas categorias, POST: Llama a la función "store" del Controlador -->
			{!!Form::open(array('url'=>'shippments/newshipment','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Customer Email</label>
            	<input type="email" name="customer_email" class="form-control">
            </div>
            <div class="form-group">
            	<label for="descripcion">Order ID</label>
            	<input type="number" name="order_id" class="form-control">
            </div>
            <div class="form-group">
            	<label for="descripcion">Vehicle ID</label>
            	<input type="number" name="vehicle_id" class="form-control">
            </div>
            <div class="form-group">
            	<label for="descripcion">IMEI</label>
            	<input type="text" name="imei" class="form-control">
            </div>
            <div class="form-group">
            	<label for="descripcion">Track Start</label>
            	<input type="text" name="track_start" class="form-control">
            </div>
            <div class="form-group">
            	<label for="descripcion">Track Duration Hour</label>
            	<input type="text" name="track_duration_hour" class="form-control">
            </div>
            <div class="form-group">
            	<label for="descripcion">Track Interval Min</label>
            	<input type="text" name="track_interval_min" class="form-control">
            </div>
            <div class="form-group">
            	<label for="descripcion">Next Position Update</label>
            	<input type="text" name="next_position_update" class="form-control">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Save</button>
            	<button class="btn btn-danger" type="reset">Cancel</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection