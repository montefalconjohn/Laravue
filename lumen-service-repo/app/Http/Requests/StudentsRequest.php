<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;
use Illuminate\Http\Request;

class StudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return Request::isMethod('post') ? $this->postValidation() : $this->patchValidation();
    }

     /**
     * Validation for post method request
     */
    private function postValidation()
    {
        return [
            'name' => 'required|string|min:3|max:120',
            'email' => 'required|email|unique:students|max:120',
            'mobile' => 'digits:11',
            'gender' => 'required|in:Male,Female,Other'
        ];
    }

    /**
     * Validation for patch method request
     */
    private function patchValidation()
    {
        // the rule in email is to avoid the unique constraint error
        return [
            'name' => 'string|min:3|max:120',
            'email' => 'email|unique:students,email,'. $this->id .'|max:120',
            'mobile' => 'digits:11',
            "gender" => 'string'
        ];
    }
}
