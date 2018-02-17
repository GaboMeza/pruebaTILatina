@extends ('layouts.admin') <!-- Extender de la plantilla admin.blade.php--> 
@section ('contenido') <!-- indicarle la sección donde se mostrara--> 
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> <!-- para el diseño responsive-->
		<h3>User List <a href="usuario/create"><button class="btn btn-success">New</button></a></h3>
		@include('seguridad.usuario.search')<!-- incluyo la vista search.blade.php--> 
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Options</th>
				</thead>
				<!-- Bucle para listar todas las categorias-->
               @foreach ($usuarios as $usu)
				<tr>
					<td>{{ $usu->id}}</td>
					<td>{{ $usu->name}}</td>
					<td>{{ $usu->email}}</td>
					<td>
						<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info">Edit</button></a>
                         <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Delete</button></a>
					</td>
				</tr>
		<!-- Incluir el archivo que contiene el modal(modal.blade.php), debe ser antes de finalizar el bucle foreach, porque se generara un modal por cada categoria.-->
				@include('seguridad.usuario.modal') 	
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}} <!-- método de paginación--> 
	</div>
</div>

@endsection