<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreCartAPIRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $cart = [
            'judul'        => ['required', 'string', 'max:255'],
            'deskripsi'    => ['nullable', 'string', 'max:65535'],
        ];

        $cartDetail = [
            'product_id'   => ['required', 'array'],
            'product_id.*' => ['required'],
            'color_id'     => ['required', 'array'],
            'color_id.*'   => ['integer'],
            'size_id'      => ['required', 'array'],
            'size_id.*'    => ['integer'],
            'jumlah'       => ['required', 'array'],
            'jumlah.*'     => ['integer'],
        ];

        if ($request->has(['product_id', 'color_id', 'size_id', 'jumlah'])) {
            return array_merge($cart, $cartDetail);
        }

        return $cart;
    }
}
