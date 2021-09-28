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
            'nik'          => ['nullable', 'string', 'max:20'],
            'nama_lengkap' => ['nullable', 'string', 'max:255'],
            'jk'           => ['nullable', 'string', 'max:1'],
            'tempat_lahir' => ['nullable', 'string', 'max:255'],
            'tgl_lahir'    => ['nullable', 'date', 'max:255'],
            'no_hp'        => ['nullable', 'string', 'max:255'],
            'no_wa'        => ['nullable', 'string', 'max:255'],
            'alamat'       => ['nullable', 'string', 'max:65535'],
        ];
    }
}
