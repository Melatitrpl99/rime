<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Spending;
use Illuminate\Http\Request;

class UpdateSpendingRequest extends FormRequest
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
            'tanggal'              => ['required', 'date'],
            'total'                => ['nullable', 'numeric'],
            'spending_category_id' => ['required'],
        ];

        $spendingDetail = [
            'nama'               => ['required', 'array'],
            'nama.*'             => ['required', 'string', 'max:255'],
            'ket'                => ['nullable', 'array'],
            'ket.*'              => ['nullable', 'string', 'max:65535'],
            'harga_satuan'       => ['nullable', 'array'],
            'harga_satuan.*'     => ['nullable', 'numeric'],
            'jumlah'             => ['required', 'array'],
            'jumlah.*'           => ['required', 'numeric'],
            'sub_total'          => ['required', 'array'],
            'sub_total.*'        => ['nullable', 'numeric'],
            'spending_unit_id'   => ['required', 'array'],
            'spending_unit_id.*' => ['required'],
            'spending_id'        => ['required', 'array'],
            'spending_id.*'      => ['required'],
        ];

        if ($request->has(['nama', 'ket', 'harga_satuan', 'jumlah', 'sub_total'])) {
            return array_merge($spending, $spendingDetail);
        }

        return $spending;
    }
}
