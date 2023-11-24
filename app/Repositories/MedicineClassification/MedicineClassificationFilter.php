<?php

namespace App\Repositories\MedicineClassification;

use App\Filters\BaseFilter;

class MedicineClassificationFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['name', 'type'];


    public function name()
    {
        if ($this->request->has('name')) {
            $this->builder->where('name', 'LIKE', '%' . $this->request->get('name') . '%');
        }
    }


    public function type()
    {
        if ($this->request->has('type')) {
            $this->builder->where('type', $this->request->get('type'));
        }
    }
}
