<?php

namespace App\Http\Requests\MedicineClassification;

use App\Rules\UniqueSlug;
use Illuminate\Foundation\Http\FormRequest;

class CreateMedicineClassificationRequest extends FormRequest
{


    /**
     * rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', new UniqueSlug('medicine_classification', $this->id)],
            'type' => ['required', 'string'],
        ];
    }
}
