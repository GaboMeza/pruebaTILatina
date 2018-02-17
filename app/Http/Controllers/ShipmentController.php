<?php

namespace vehicleTracking\Http\Controllers;

use Illuminate\Http\Request;
use vehicleTracking\Http\Requests;
//Añadir Espacio de nombres
use vehicleTracking\Shipment; //Añadir el modelo (Providers)
use Illuminate\Support\Facades\Redirect; //Para hacer redirecciones
use vehicleTracking\Http\Requests\ShipmentFormRequest; //Trabajar con el archivo de reglas "CategoriaFormRequest"
use DB; // Para la Base de Datos


class ShipmentController extends Controller
{
    //Este contructor sirve para prohibir el acceso a usuarios no logeados. 
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request) //Muestra el Inicio de la app y se encarga de la busqueda de las Categorias.
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $categorias=DB::table('shippment')->where('imei','LIKE','%'.$query.'%')//buscar por imei
            ->where ('condition','=','1')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('shippments.newshipment.index',["shippments"=>$shippments,"searchText"=>$query]);
        }
    }
    public function create() //Crea una nueva vista(Categoria)
    {
        return view("shippments.newshipment.create");
    }
    public function store (ShipmentFormRequest $request) //Almacena valores en la tabla Categoria de la BD
    {
        $shipment=new Shipment;
        $shipment->customer_email=$request->get('customer_email');
        $shipment->order_id=$request->get('order_id');
        $shipment->vehicle_id=$request->get('vehicle_id');
        $shipment->imei=$request->get('imei');
        $shipment->track_start=$request->get('track_start');
        $shipment->track_duration_hour=$request->get('track_duration_hour');
        $shipment->track_interval_min=$request->get('track_interval_min');
        $shipment->next_position_update=$request->get('next_position_update');
        $shipment->condition='1';
        $shipment->save();
        return Redirect::to('shippments/newshipment');
    }
    public function show($id) //Muestra la Categoria del id especifico 
    {
        return view("shippments.newshipment.show",["shipment"=>Shipment::findOrFail($id)]);
    }
    public function edit($id) //Para editar la Categoria del id especifico 
    {
        return view("shippments.newshipment.edit",["shipment"=>Shipment::findOrFail($id)]);
    }
    public function update(ShipmentFormRequest $request,$id) //Modifica tabla Categoria con el id que recibe del FormRequest
    {
        $shipment=Shipment::findOrFail($id);
        $shipment->customer_email=$request->get('customer_email');
        $shipment->order_id=$request->get('order_id');
        $shipment->vehicle_id=$request->get('vehicle_id');
        $shipment->imei=$request->get('imei');
        $shipment->track_start=$request->get('track_start');
        $shipment->track_duration_hour=$request->get('track_duration_hour');
        $shipment->track_interval_min=$request->get('track_interval_min');
        $shipment->next_position_update=$request->get('next_position_update');
        $shipment->update();
        return Redirect::to('shippments/newshipment');
    }
    public function destroy($id)//Modifica el parametro "condición" y lo iguala a "0" para no mostrar en el listado de todas la categorias. 
    {
        $shipment=Shipment::findOrFail($id);
        $shipment->condition='0';
        $shipment->update();
        return Redirect::to('shippments/newshipment');
    }
}
