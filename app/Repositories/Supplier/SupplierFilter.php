<?php

namespace App\Repositories\Supplier;

use App\Filters\BaseFilter;

class SupplierFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['name', 'email'];


    public function name()
    {
        if ($this->request->has('name')) {
            $this->builder->where('name', 'LIKE', '%' . $this->request->get('name') . '%');
        }
    }


    public function email()
    {
        if ($this->request->has('email')) {
            $this->builder->where('email', $this->request->get('email'));
        }
    }
}
