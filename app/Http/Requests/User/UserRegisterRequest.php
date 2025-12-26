<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required'],
            'country' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],
            'type_of_enterprice' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:255'],
            'physical_address' => ['required', 'string', 'max:255'],
            'postal_address' => ['required', 'string', 'max:255'],
            'type_of_user' => ['required', 'string', 'max:255'],
        ];

        if ($this->type_of_user === 'individual') {
            $rules += [
                'name' => ['required', 'string', 'max:255', 'unique:users,name'],
                'surname' => ['required', 'string', 'max:255'],
                'national_id' => ['required', 'string', 'max:255'],
                'national_id_number' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'max:255'],
            ];
        } else {
            $rules += [
                'org_name' => ['required', 'string', 'max:255', 'unique:users,org_name'],
                'org_type' => ['required', 'string', 'max:255'],
                'registration_document' => ['required', 'string', 'max:255'],
                'registration_number' => ['required', 'string', 'max:255'],
            ];
        }



        return $rules;
    }
}
