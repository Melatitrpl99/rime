<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserShipmentAPIRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'alamat'      => ['required'],
            'kode_pos'    => ['required'],
            'catatan'     => ['nullable'],
            'is_default'  => ['nullable'],
            'village_id'  => ['required'],
        ];
    }
}
