<?php

namespace App\Repositories\SalesItem;


use App\Models\SalesItem;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EloquentSalesItemRepository extends RepositoryImplementation implements SalesItemRepository
{
    /**
     * EloquentSalesItemRepository constructor.
     * @param SalesItem $SalesItem
     */
    public function __construct(SalesItem $SalesItem, Log $log)
    {
        parent::__construct($log, $SalesItem);
    }

    public function getModel()
    {
        return new SalesItem();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->filter(new SalesItemFilter($request))
            ->latest()
            ->paginate($limit);
    }
}
