<?php

namespace App\Repositories\Receiving;


use App\Models\Receiving;
use App\Models\ReceivingManagement;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EloquentReceivingRepository extends RepositoryImplementation implements ReceivingRepository
{
    /**
     * EloquentReceivingRepository constructor.
     * @param Receiving $Receiving
     */
    public function __construct(ReceivingManagement $receiving, Log $log)
    {
        parent::__construct($log, $receiving);
    }

    public function getModel()
    {
        return new ReceivingManagement();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->filter(new ReceivingFilter($request))
            ->latest()
            ->paginate($limit);
    }

    public function getDistinctColumnData($column)
    {
        return $this->model->select(DB::raw("$column as distinctData"))
            ->distinct()
            ->pluck('distinctData')
            ->toArray();
    }
}
