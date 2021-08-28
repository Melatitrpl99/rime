<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonyAPIRequest extends FormRequest
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
            'judul'      => ['nullable', 'string', 'max:255'],
            'isi'        => ['nullable', 'string', 'max:65535'],
            'review'     => ['required', 'numeric'],
            'user_id'    => ['required'],
            'product_id' => ['required'],
        ];
    }
}
