<?php

namespace App\Repositories\Sales;


use App\Models\Sales;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EloquentSalesRepository extends RepositoryImplementation implements SalesRepository
{
    /**
     * EloquentSalesRepository constructor.
     * @param Sales $Sales
     */
    public function __construct(Sales $Sales, Log $log)
    {
        parent::__construct($log, $Sales);
    }

    public function getModel()
    {
        return new Sales();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->where('created_by', Auth::user()->id)
            ->filter(new SalesFilter($request))
            ->latest()
            ->paginate($limit);
    }
}
