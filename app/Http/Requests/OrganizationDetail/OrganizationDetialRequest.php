<?php

namespace App\Http\Requests\OrganizationDetail;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationDetialRequest extends FormRequest
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
            'user_id' => ['required', 'string', 'exists:users,id'],
            'cooperative' => ['nullable', 'string', 'max:255'],
            'sub_cooperative' => ['nullable', 'string', 'max:255'],
            'contract' => ['nullable', 'string', 'max:255'],
            'sub_contract' => ['nullable', 'string', 'max:255'],
            'area_of_focous' => ['nullable', 'string', 'max:255'],
            'industry_activity_survey_detail' => ['nullable', 'string', 'max:255'],
            'industry_activity_survey_vision' => ['nullable', 'string', 'max:255'],
            'referal' => ['nullable', 'boolean'],
            'referal_number' => ['nullable', 'string', 'max:255'],
            'data_use' => ['nullable', 'array'],
        ];
    }
}
