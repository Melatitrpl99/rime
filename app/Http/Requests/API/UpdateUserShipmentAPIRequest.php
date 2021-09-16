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
            'alamat'     => ['required', 'string', 'max:65535'],
            'kode_pos'   => ['required', 'string', 'max:10'],
            'catatan'    => ['nullable', 'string', 'max:65535'],
            'is_default' => ['nullable', 'boolean'],
            'village'    => ['required', 'string', 'max:255'],
            'district'   => ['required', 'string', 'max:255'],
            'regency'    => ['required', 'string', 'max:255'],
            'province'   => ['required', 'string', 'max:255'],
        ];
    }
}
