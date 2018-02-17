@extends ('layouts.admin') <!-- Extender de la plantilla admin.blade.php--> 
@section ('contenido') <!-- indicarle la sección donde se mostrara--> 
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> <!-- para el diseño responsive-->
		<h3>Shipment List <a href="categoria/create"><button class="btn btn-success">New</button></a></h3>
		@include('shippments.newshipment.search')<!-- incluyo la vista search.blade.php--> 
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Customer Email</th>
					<th>Order ID</th>
					<th>Vehicle ID</th>
					<th>IMEI</th>
					<th>Track Start</th>
					<th>Track Duration Hour</th>
					<th>Track Interval Min</th>
					<th>Next Position Update</th>
					<th>Options</th>
				</thead>
				<!-- Bucle para listar todas las categorias-->
               @foreach ($shipments as $ship)
				<tr>
					<td>{{ $ship->id}}</td>
					<td>{{ $ship->customer_email}}</td>
					<td>{{ $ship->order_id}}</td>
					<td>{{ $ship->vehicle_id}}</td>
					<td>{{ $ship->imei}}</td>
					<td>{{ $ship->track_start}}</td>
					<td>{{ $ship->track_duration_hour}}</td>
					<td>{{ $ship->track_interval_min}}</td>
					<td>{{ $ship->next_position_update}}</td>
					<td>
						<a href="{{URL::action('ShipmentController@edit',$ship->id)}}"><button class="btn btn-info">Edit</button></a>
                         <a href="" data-target="#modal-delete-{{$shio->id}}" data-toggle="modal"><button class="btn btn-danger">Delete</button></a>
					</td>
				</tr>
		<!-- Incluir el archivo que contiene el modal(modal.blade.php), debe ser antes de finalizar el bucle foreach, porque se generara un modal por cada categoria.-->
				@include('shippments.newshipment.modal') 	
				@endforeach
			</table>
		</div>
		{{$shipments->render()}} <!-- método de paginación--> 
	</div>
</div>

@endsection