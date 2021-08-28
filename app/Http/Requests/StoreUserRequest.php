<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email'         => ['required', 'email', 'unique:users'],
            'password'      => ['required'],
            'nama_lengkap'  => ['required'],
            'jenis_kelamin' => ['nullable'],
            'tempat_lahir'  => ['nullable'],
            'tgl_lahir'     => ['nullable', 'date'],
            'alamat'        => ['nullable'],
            'no_hp'         => ['nullable', 'regex:/^(\+62|0)\w+/g'],
            'no_wa'         => ['nullable', 'regex:/^(\+62|0)\w+/g'],
        ];
    }
}
