<?php

namespace App\Http\Requests\MedicineClassification;

use App\Rules\UniqueSlug;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicineClassificationRequest extends FormRequest
{


    /**
     * rules
     *
     * @return array
     */
    public function rules(): array
    {
        $id = $this->route('medicine_classification');
        return [
            'name' => ['required', 'string', 'max:255', new UniqueSlug('medicine_classification', $id)],
            'type' => ['required', 'string'],
        ];
    }
}
