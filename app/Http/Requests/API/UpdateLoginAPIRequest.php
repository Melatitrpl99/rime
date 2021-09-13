<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoginAPIRequest extends FormRequest
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
            'email'        => ['required', 'string', 'max:255', 'email', 'exists:users'],
            'old_password' => ['required', 'string', 'max:255', 'current_password'],
            'new_password' => ['required', 'string', 'max:255'],
        ];
    }
}
