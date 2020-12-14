<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'status' => 'required|string',
            'job_type_id' =>'required',
            "industry_category_id" => 'required',
            'career_level_id' => 'required',
            'company_id' => 'required',
            'country_id' => 'required',
            'city_id' =>'required' ,
            'min_years_of_experience' =>'required|numeric',
            'max_years_of_experience' => 'required|numeric',
            'vacancies' =>'required|numeric' ,
            'min_salary' => 'required|numeric',
            'max_salary' => 'required|numeric',
            'description' => 'required|string',
            'requirements' => 'required|string',
        ];
    }
}
