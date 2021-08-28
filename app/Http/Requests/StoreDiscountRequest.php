<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class StoreDiscountRequest extends FormRequest
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
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $discount = [
            'judul'           => ['required', 'string', 'max:255'],
            'deskripsi'       => ['nullable', 'string', 'max:65535'],
            'kode'            => ['required', 'string', 'unique:discounts', 'max:16'],
            'batas_pemakaian' => ['nullable', 'numeric'],
            'waktu_mulai'     => ['required', 'date'],
            'waktu_berakhir'  => ['nullable', 'date', 'after_or_equal:waktu_mulai'],
        ];

        $discountDetail = [
            'product_id'        => ['required', 'array'],
            'product_id.*'      => ['required'],
            'diskon_harga'      => ['required', 'array'],
            'diskon_harga.*'    => ['required', 'numeric'],
            'minimal_produk'    => ['required', 'array'],
            'minimal_produk.*'  => ['required', 'numeric'],
            'maksimal_produk'   => ['nullable', 'array'],
            'maksimal_produk.*' => ['nullable', 'numeric'],
        ];

        if ($request->has(['product_id', 'diskon_harga', 'minimal_produk', 'maksimal_produk'])) {
            return array_merge($discount, $discountDetail);
        }

        return $discount;
    }
}
