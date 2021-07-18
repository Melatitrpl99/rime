<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Cart;

class CreateCartRequest extends FormRequest
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
        $cartDetail = [
            'product_id' => 'required|array:product_id',
            'color_id' => 'required|array:color_id',
            'size_id' => 'exclude_unless:dimension_id,null|array',
            'dimension_id' => 'exlucde_unless:size_id,null|array',
            'jumlah' => 'required|array|numeric',
            'sub_total' => 'nullable|integer'
        ];
        return Cart::$rules;
    }
}
