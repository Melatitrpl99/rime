<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\UserVerification;

class StoreUserVerificationRequest extends FormRequest
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
            'result_token' => ['nullable'],
            'similarity'   => ['nullable'],
            'accuracy'     => ['nullable'],
            'status'       => ['nullable'],
            'user_id'      => ['required'],
        ];
    }
}
