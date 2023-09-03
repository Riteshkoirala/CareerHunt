<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|max:40',
            'lastname' => 'required|max:40',
            'location' => 'nullable|regex:/^[a-zA-Z0-9-]+\s*,\s*[a-zA-Z0-9-]+$/i',
            'contact_number' => 'nullable|regex:/^[0-9\+]+$/',
            'skills' => 'nullable|max:250',
            'education' => 'nullable|max:500',
            'image'=>'nullable|max:60000',
            'cv'=>'nullable|max:60000',
            'college_name'=>'nullable|max:100',
            'about'=>'nullable|max:250',
            'experience'=>'nullable|max:250',
            'linkedin_link'=>'nullable|url',

        ];
    }
}
