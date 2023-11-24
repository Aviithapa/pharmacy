<?php

namespace App\Http\Requests\Medicine;

use App\Rules\UpdateUniqueValidate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicineRequest extends FormRequest
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
        $id = $this->route('medicine');
        return [
            'name' => ['required', 'string', 'max:255'],
            'generic_name' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string',  'max:255', new UpdateUniqueValidate('medicine', $id)],
            'description' => ['string', 'nullable'],
            'measurement' => ['nullable', 'string'],
            'prescription_required' => ['nullable', 'string:on'],
            'type_id' => ['string'],
            'category_id' => ['string'],
        ];
    }
}
