<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        //these are the validation of the data that comes form the front of the form

        return [
            'contact_fullname'=>'required|string',
            'contact_email'=>'required|email',
            'contact_numbers'=>'nullable',
            'contact_message'=>'required|max:250',
        ];
    }
}
