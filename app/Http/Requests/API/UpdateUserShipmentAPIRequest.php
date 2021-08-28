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
            'village_id'  => ['required'],
            'kode_pos'    => ['required'],
            'catatan'     => ['nullable'],
            'is_default'  => ['nullable'],
            'user_id'     => ['required'],
        ];
    }
}
