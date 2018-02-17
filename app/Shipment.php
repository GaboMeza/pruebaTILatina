<?php

namespace vehicleTracking;

use Illuminate\Database\Eloquent\Model;

class Shippment extends Model
{
    protected $table='shippment';

    protected $primaryKey='id';

    public $timestamps=false; //para añadir 2 columnas a la tabla (creación y actualización), para este caso no son necesarias. True=Añadir - False=No añadir

//Añadir datos de la tabla que recibiran un valor. 
    protected $fillable =[
    	'customer_email',
    	'order_id',
    	'vehicle_id',
        'imei',
        'track_start',
        'track_duration_hour',
        'track_interval_min',
        'next_position_update'

    ];

//Se utiliza cuando no queremos que se asignen datos al modelo. 
    protected $guarded =[

    ];

}
