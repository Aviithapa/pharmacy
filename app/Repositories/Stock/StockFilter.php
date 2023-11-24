<?php

namespace App\Repositories\Stock;

use App\Filters\BaseFilter;

class StockFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['medicine_id', 'mfg_date', 'receiving_id', 'expiry_date'];


    public function expiryDate()
    {
        if ($this->request->has('expiry_date')) {
            $this->builder->where('expiry_date', 'LIKE', '%' . $this->request->get('expiry_date') . '%');
        }
    }

    public function medicineId()
    {
        if ($this->request->has('medicine_id')) {
            $this->builder->where('medicine_id', $this->request->get('medicine_id'));
        }
    }

    public function receivingId()
    {
        if ($this->request->has('receiving_id')) {
            $this->builder->where('receiving_id', $this->request->get('receiving_id'));
        }
    }

    public function mfgDate()
    {
        if ($this->request->has('mfg_date')) {
            $this->builder->where('mfg_date', $this->request->get('mfg_date'));
        }
    }
}
