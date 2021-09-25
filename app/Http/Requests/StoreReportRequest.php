<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Report;

class StoreReportRequest extends FormRequest
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
            'judul'              => ['required', 'string', 'max:255'],
            'deskripsi'          => ['nullable', 'string', 'max:65535'],
            'laporan_mulai'      => ['required', 'date'],
            'laporan_selesai'    => ['required', 'date'],
            'report_category_id' => ['required'],
            'is_import'          => ['nullable', 'boolean'],
            'path'               => ['nullable', 'array'],
        ];
    }
}
