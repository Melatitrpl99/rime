<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class StoreOrderRequest extends FormRequest
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
            'biaya_pengiriman'  => ['required', 'numeric'],
            'berat'             => ['required', 'numeric'],
            'kode_resi'         => ['nullable', 'string'],
            'discount_id'       => ['nullable'],
            'status_id'         => ['required'],
            'payment_method_id' => ['required'],
            'user_shipment_id'  => ['required'],
            'user_id'           => ['required'],
        ];

        $orderDetail = [
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
            return array_merge($order, $orderDetail);
        }

        return $order;
    }
}
