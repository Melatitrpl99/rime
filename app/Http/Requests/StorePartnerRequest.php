<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
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
            'nama'      => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string', 'max:65535'],
            'alamat'    => ['required', 'string', 'max:65535'],
            'lokasi'    => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'unique:partners'],
            'no_telp'   => ['nullable', 'regex:/^(\+62|0)\w+/g'],
        ];
    }
}
