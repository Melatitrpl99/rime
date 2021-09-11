<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileAPIRequest extends FormRequest
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
            'nama_lengkap' => ['sometimes', 'required', 'string', 'max:255'],
            'jk'           => ['sometimes', 'required', 'string', 'max:1'],
            'tempat_lahir' => ['sometimes', 'required', 'string', 'max:255'],
            'tgl_lahir'    => ['sometimes', 'required', 'string', 'max:255'],
            'no_hp'        => ['sometimes', 'required', 'string', 'max:255'],
            'no_wa'        => ['sometimes', 'required', 'string', 'max:255'],
            'alamat'       => ['sometimes', 'required', 'string', 'max:65535'],
        ];
    }
}
