<?php

namespace App\Repositories\Stock;


use App\Models\StockManagement;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EloquentStockRepository extends RepositoryImplementation implements StockRepository
{
    /**
     * EloquentStockRepository constructor.
     * @param Stock $Stock
     */
    public function __construct(StockManagement $stock, Log $log)
    {
        parent::__construct($log, $stock);
    }

    public function getModel()
    {
        return new StockManagement();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->where('created_by', Auth::user()->id)
            ->filter(new StockFilter($request))
            ->latest()
            ->paginate($limit);
    }
}
