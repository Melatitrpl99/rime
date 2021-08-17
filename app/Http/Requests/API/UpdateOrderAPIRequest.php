<?php

namespace App\Http\Requests\API;

use App\Models\Order;
use InfyOm\Generator\Request\APIRequest;

class UpdateOrderAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pesan'            => 'nullable',
            'total'            => 'nullable|numeric',
            'kode_diskon'      => 'nullable|string',
            'biaya_pengiriman' => 'nullable|numeric',
            'berat'            => 'nullable|numeric',
            'kode_resi'        => 'nullable|string',
            'shipment_id'      => 'required',
        ];
    }
}
