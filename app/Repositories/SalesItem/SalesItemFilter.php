<?php

namespace App\Repositories\SalesItem;

use App\Filters\BaseFilter;

class SalesItemFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['supplier_id', 'date', 'ref_number'];

    public function refNumber()
    {
        if ($this->request->has('ref_number')) {
            $this->builder->where('ref_number', 'LIKE', '%' . $this->request->get('ref_number') . '%');
        }
    }

    public function supplierId()
    {
        if ($this->request->has('supplier_id')) {
            $this->builder->where('supplier_id',  $this->request->get('supplier_id'));
        }
    }

    public function date()
    {
        if ($this->request->has('date')) {
            $this->builder->where('received_date', 'LIKE', '%' . $this->request->get('date') . '%');
        }
    }
}
