<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'title' => 'required',
            'nationality' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'summary' => 'required',
            'degree' => 'required',
            'freelance' => 'required|in:0,1',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'this field is required',
            'in' => 'this field must be 0 (is not active) or 1 (is active)',
            'email' => 'invalide email'
        ];
    }
}
