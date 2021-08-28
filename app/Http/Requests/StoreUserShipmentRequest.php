<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserShipmentRequest extends FormRequest
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
