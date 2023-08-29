<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCvRequest extends FormRequest
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
        return [
            'user_id' => 'required',
            'fullname'=>'string',
            'email'=>'email',
            'title'=>'string',
            'location'=>'string',
            'contact_number'=>'string',
            'language'=>'string',
            'objective'=>'nullable',
            'education'=>'nullable',
            'skills'=>'nullable',
            'experience'=>'nullable',
            'projects'=>'nullable',
            'certification_training'=>'nullable',
            'linkedin_link'=>'string',
            'github_link'=>'string',
            'image_name'=>'string',
            'image_path'=>'string',
            'updated_at'=>'nullable',
        ];
    }
}
