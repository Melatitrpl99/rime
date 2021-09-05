<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreOrderAPIRequest extends FormRequest
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
        $order = [
            'pesan'             => ['nullable'],
            'kode_resi'         => ['nullable', 'string'],
            'discount_id'       => ['nullable'],
            'kode_diskon'       => ['nullable', 'string', 'max:255'],
            'user_shipment_id'  => ['required'],
            'payment_method_id' => ['required'],
            'product_id'        => ['required', 'array'],
            'product_id.*'      => ['required'],
            'color_id'          => ['required', 'array'],
            'color_id.*'        => ['integer'],
            'size_id'           => ['required', 'array'],
            'size_id.*'         => ['integer'],
            'jumlah'            => ['required', 'array'],
            'jumlah.*'          => ['integer'],
        ];

        return $order;
    }
}
