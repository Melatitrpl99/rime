<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'judul'            => ['required', 'string', 'max:255'],
            'konten'           => ['required', 'string', 'max:4294967295'],
            'slug'             => ['nullable', 'string', 'max:255'],
            'front_page'       => ['sometimes', 'required'],
            'post_category_id' => ['required'],
            'user_id'          => ['required'],
        ];
    }
}
