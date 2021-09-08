<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CartDetailModifyProductsAPIRequest extends FormRequest
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
            'product_id'   => ['required', 'array'],
            'product_id.*' => ['required'],
            'color_id'     => ['required', 'array'],
            'color_id.*'   => ['required'],
            'size_id'      => ['required', 'array'],
            'size_id.*'    => ['required'],
            'jumlah'       => ['required', 'array'],
            'jumlah.*'     => ['required', 'numeric'],
        ];
    }
}