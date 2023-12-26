<?php

namespace App\Repositories\Supplier;

use App\Models\Supplier;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EloquentSupplierRepository extends RepositoryImplementation implements SupplierRepository
{
    /**
     * EloquentSupplierRepository constructor.
     * @param Supplier $Supplier
     */
    public function __construct(Supplier $supplier, Log $log)
    {
        parent::__construct($log, $supplier);
    }

    public function getModel()
    {
        return new Supplier();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->where('created_by', Auth::user()->id)
            ->filter(new SupplierFilter($request))
            ->latest()
            ->paginate($limit);
    }
}
