<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'first_name'=> 'required ',
                'last_name'=> 'required | min:7 | max:24',
                'email'=>'required|email',
                'password'=>'required|min:8',
                'image'=>'required | image'
        ];
    }
}
