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
            'title' => 'required|min:5|string|regex:/^([a-z-A-Z]+)(\s[a-zA-Z]+)*$/',
            'status' => 'required|string',
            'job_type_id' =>'required',
            "industry_category_id" => 'required',
            'career_level_id' => 'required',
            'country_id' => 'required',
            'city_id' =>'required',
            'min_years_of_experience' =>'required|numeric|integer|min:0',
            'max_years_of_experience' => 'required|numeric|integer|min:1',
            'vacancies' =>'required|numeric|integer|min:1' ,
            'min_salary' => 'required|numeric|integer|min:1000',
            'max_salary' => 'required|numeric|integer|min:1000',
            'description' => 'required|string|min:20',
            'requirements' => 'required|string|min:20',
        ];
    }
}
