<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
            'title' => 'required|string',
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
            "industry_category_id" => 'required|exists:industry_categories,id',
            'career_level_id' => 'required|exists:career_levels,id',
            "company" => "required",
            "description" => "required",
            "user_id" =>"required"
        ];
    }
}
