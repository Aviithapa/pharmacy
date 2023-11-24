<?php

namespace App\Repositories\Customer;


use App\Models\Customer;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EloquentCustomerRepository extends RepositoryImplementation implements CustomerRepository
{
    /**
     * EloquentCustomerRepository constructor.
     * @param Customer $Customer
     */
    public function __construct(Customer $Customer, Log $log)
    {
        parent::__construct($log, $Customer);
    }

    public function getModel()
    {
        return new Customer();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->filter(new CustomerFilter($request))
            ->latest()
            ->paginate($limit);
    }
}
