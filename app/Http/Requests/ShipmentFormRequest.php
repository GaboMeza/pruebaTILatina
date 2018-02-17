<?php

namespace vehicleTracking\Http\Requests;

use vehicleTracking\Http\Requests\Request;

class ShipmentFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //Autorizar al usuario para hacer peticiones 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer'=>'required',
            'order_id'=>'required',
            'vehicle_id'=>'required',
            'imei'=>'required',
            'track_start'=>'required',
            'track_duration_hour'=>'required',
            'track_interval_min'=>'required',
            'next_position_update'=>'required',
        ];
    }
}
