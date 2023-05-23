<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type_id' => 'nullable|exists:types,id',
            'project_name' => 'required|max:30|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'revenues' => 'required|numeric',
            'client' => 'required|string',
            'project_summary' => 'required|string',
            'is_completed' => 'boolean',
            'project_image' => 'nullable|image'
        ];
    }
}
