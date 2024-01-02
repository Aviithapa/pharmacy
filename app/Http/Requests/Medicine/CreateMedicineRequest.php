<?php

namespace App\Http\Requests\Medicine;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMedicineRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'generic_name' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string', 'max:255', 'unique:medicine'],
            'description' => ['string', 'nullable'],
            'measurement' => ['nullable', 'string'],
            'prescription_required' => ['nullable', 'string:on'],
            'type_id' => ['string'],
            'category_id' => ['string'],
        ];

        // Add custom validation rule to check for uniqueness of name and measurement
        $rules['measurement'] = array_merge($rules['measurement'], [
            Rule::unique('medicine')->where(function ($query) {
                return $query->where('name', $this->input('name'))
                    ->where('measurement', $this->input('measurement'));
            }),
        ]);

        $rules['name'] = array_merge($rules['name'], [
            Rule::unique('medicine')->where(function ($query) {
                return $query->where('name', $this->input('name'))
                    ->where('measurement', $this->input('measurement'));
            }),
        ]);

        return $rules;
    }
}
