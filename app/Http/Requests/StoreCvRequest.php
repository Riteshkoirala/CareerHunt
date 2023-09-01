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
            'fullname'=>'nullable|string',
            'email'=>'nullable|email',
            'title'=>'nullable|string',
            'location'=>'nullable|string',
            'contact_number'=>'nullable|string',
            'language'=>'nullable|string',
            'objective'=>'nullable',
            'education'=>'nullable',
            'skills'=>'nullable',
            'experience'=>'nullable',
            'projects'=>'nullable',
            'certification_training'=>'nullable',
            'linkedin_link'=>'nullable|string',
            'github_link'=>'nullable|string',
            'image_name'=>'nullable|string',
            'image_path'=>'nullable|string',
            'updated_at'=>'nullable',
            'cropped_image_name'=>'nullable',
        ];
    }
}
