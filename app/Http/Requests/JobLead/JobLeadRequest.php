<?php

namespace App\Http\Requests\JobLead;

use Illuminate\Foundation\Http\FormRequest;

class JobLeadRequest extends FormRequest
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
        return [
            'user_id'      => ['required', 'exists:users,id'],

            'to_name'      => ['required', 'string', 'max:255'],
            'to_mobile'    => ['required', 'string', 'max:20'],
            'to_email'     => ['required', 'email', 'max:255'],

            'from_name'    => ['required', 'string', 'max:255'],
            'from_mobile'  => ['required', 'string', 'max:20'],
            'from_email'   => ['required', 'email', 'max:255'],

            'title'        => ['required', 'string', 'max:255'],
            'date'         => ['required', 'string', 'max:225'],
            'time'         => ['required', 'string', 'max:50'],
            'location'     => ['required', 'string', 'max:255'],
            'description'  => ['required', 'string'],
            'rate'         => ['required', 'string', 'max:100'],

            'image1'       => ['nullable', 'string', 'max:255'],
            'image2'       => ['nullable', 'string', 'max:255'],

            'from_time'    => ['required', 'date', 'max:50'],
            'to_time'      => ['required', 'date', 'max:50'],
        ];
    }
}
