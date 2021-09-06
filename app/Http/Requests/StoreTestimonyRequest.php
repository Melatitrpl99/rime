<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonyRequest extends FormRequest
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
            'isi'        => ['nullable', 'string', 'max:65535'],
            'rating'     => ['required', 'numeric'],
            'user_id'    => ['required'],
            'product_id' => ['required'],
        ];
    }
}
