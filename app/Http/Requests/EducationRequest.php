<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
            'organization' => 'required|string',
            'grade' => 'required|string|max:64',
            'degree' => 'required|string',
            'field_of_study' => 'required|string',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
