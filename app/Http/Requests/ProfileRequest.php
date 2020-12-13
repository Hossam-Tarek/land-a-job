<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
           'user_id' => 'required||exists:users,id',
           'career_level_id' => 'required|exists:career_levels,id',
           'country_id' => 'required|exists:countries,id',
           'city_id' => 'required|cities:states,id',
           'gender' => 'required',
           'min_salary' => 'required|integer',
           'military_status' => 'required',
           'education_level' => 'required',
           'job_title' => 'required',
           'cv' => 'nullable|File',        
        ];
    }
}
