<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            "user_id" => "required|numeric|min:0",
            "country_id" => "required|numeric|min:0",
            "city_id" => "required|numeric|min:0",
            "number_of_employee_id" => "required|numeric|min:0",
            "industry_category_id" => "required|numeric|min:0",
            "name" => "required|max:128",
            // "name" => "required|unique:companies|max:128",
            // "name" => ['required','unique:companies,user_id,' . $this->company->user_id],
            "url" => "required|url",
            "about" => "required",
            "founded_date" => "required|date",
            "logo" => "nullable|image|max:220",
            "cover_image" => "nullable|image|max:220"
        ];
    }
}
