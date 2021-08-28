<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $product = [
            'nama'                => ['required', 'string', 'max:255'],
            'deskripsi'           => ['required', 'string', 'max:4294967295'],
            'harga_customer'      => ['required', 'numeric'],
            'harga_reseller'      => ['required', 'numeric'],
            'reseller_minimum'    => ['required', 'numeric'],
            'suka'                => ['nullable', 'numeric'],
            'slug'                => ['nullable', 'string', 'max:255'],
            'product_category_id' => ['required'],
        ];

        $productStock = [
            'product_id'   => ['required', 'array'],
            'product_id.*' => ['required'],
            'color_id'     => ['required', 'array'],
            'color_id.*'   => ['required'],
            'size_id'      => ['required', 'array'],
            'size_id.*'    => ['required'],
            'stok_ready'   => ['required', 'array'],
            'stok_ready.*' => ['nullable', 'numeric'],
        ];

        if ($request->has(['product_id', 'color_id', 'size_id', 'stok_ready'])) {
            return array_merge($product, $productStock);
        }

        return $product;
    }
}
