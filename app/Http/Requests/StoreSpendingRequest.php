<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreSpendingRequest extends FormRequest
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
        $spending = [
            'judul'                => ['required', 'string', 'max:255'],
            'deskripsi'            => ['nullable', 'string', 'max:65535'],
            'total'                => ['nullable', 'numeric'],
            'spending_category_id' => ['required'],
        ];

        $spendingDetail = [
            'product_id'         => ['required', 'array'],
            'product_id.*'       => ['required'],
            'nama'               => ['required', 'array'],
            'nama.*'             => ['required', 'string', 'max:255'],
            'ket'                => ['required', 'array'],
            'ket.*'              => ['nullable', 'string', 'max:65535'],
            'harga_satuan'       => ['nullable', 'array'],
            'harga_satuan.*'     => ['nullable', 'numeric'],
            'jumlah_item'        => ['required', 'array'],
            'jumlah_item.*'      => ['required', 'numeric'],
            'jumlah_stok'        => ['required', 'array'],
            'jumlah_stok.*'      => ['nullable', 'numeric'],
            'sub_total'          => ['exclude_unless:harga_satuan,null', 'array'],
            'sub_total.*'        => ['nullable', 'numeric'],
            'spending_unit_id'   => ['required', 'array'],
            'spending_unit_id.*' => ['required'],
            'color_id'           => ['required', 'array'],
            'color_id.*'         => ['required'],
            'size_id'            => ['required', 'array'],
            'size_id.*'          => ['required'],
        ];

        if ($request->has(['product_id', 'nama', 'ket', 'harga_satuan', 'jumlah_item', 'jumlah_stok', 'sub_total', 'spending_unit_id', 'color_id', 'size_id'])) {
            return array_merge($spending, $spendingDetail);
        }

        return $spending;
    }
}
