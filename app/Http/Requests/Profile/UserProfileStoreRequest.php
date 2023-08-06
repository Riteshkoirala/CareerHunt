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
            'location' => 'required|regex:/^[a-zA-Z0-9-]+\s*,\s*[a-zA-Z0-9-]+$/i',
            'contact_number' => 'required|regex:/^[0-9\+]+$/',
            'skills' => 'required|max:250',
            'education' => 'required|max:500',
            'image'=>'max:60000',
            'cv'=>'max:60000',
            'college_name'=>'required|max:100',
            'about'=>'required|max:250',
            'experience'=>'required|max:250',
            'linkedin_link'=>'url',

        ];
    }
}
