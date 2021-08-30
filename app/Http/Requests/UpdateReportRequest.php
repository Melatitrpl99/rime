<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Report;

class UpdateReportRequest extends FormRequest
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
            'path'      => ['sometimes', 'required'],
            'judul'     => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string', 'max:65535'],
            'is_import' => ['required', 'boolean'],
            'user_id'   => ['required'],
        ];
    }
}
