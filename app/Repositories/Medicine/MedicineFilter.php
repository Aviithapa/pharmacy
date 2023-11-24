<?php

namespace App\Repositories\Medicine;

use App\Filters\BaseFilter;

class MedicineFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['name', 'sku', 'type_id', 'prescription_required', 'category_id'];


    public function name()
    {
        if ($this->request->has('name')) {
            $this->builder->where('name', 'LIKE', '%' . $this->request->get('name') . '%');
        }
    }

    public function sku()
    {
        if ($this->request->has('sku')) {
            $this->builder->where('sku', 'LIKE', '%' . $this->request->get('sku') . '%');
        }
    }

    public function typeId()
    {
        if ($this->request->has('type_id')) {
            $this->builder->where('type_id', $this->request->get('type_id'));
        }
    }

    public function categoryId()
    {
        if ($this->request->has('category_id')) {
            $this->builder->where('category_id', $this->request->get('category_id'));
        }
    }

    public function prescriptionRequired()
    {
        if ($this->request->has('prescription_required')) {
            $this->builder->where('prescription_required', $this->request->get('prescription_required'));
        }
    }
}
