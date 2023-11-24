<?php

namespace App\Http\Requests\Medicine;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => ['required', 'string', 'max:255'],
            'generic_name' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string',  'max:255', 'unique:medicine'],
            'description' => ['string', 'nullable'],
            'measurement' => ['nullable', 'string'],
            'prescription_required' => ['nullable', 'string:on'],
            'type_id' => ['string'],
            'category_id' => ['string'],
        ];
    }
}
