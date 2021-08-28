<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreProductRequest extends FormRequest
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
            'path'                => ['nullable', 'array'],
            'path.*'              => ['required', 'string'],
            'product_category_id' => ['required'],
        ];

        $productStock = [
            'color_id'     => ['required', 'array'],
            'color_id.*'   => ['required'],
            'size_id'      => ['required', 'array'],
            'size_id.*'    => ['required'],
            'stok_ready'   => ['required', 'array'],
            'stok_ready.*' => ['required', 'numeric', 'min:0'],
        ];

        if ($request->has(['color_id', 'size_id', 'stok_ready'])) {
            return array_merge($product, $productStock);
        }

        return $product;
    }
}
