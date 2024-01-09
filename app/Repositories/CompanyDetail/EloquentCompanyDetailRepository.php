<?php

namespace App\Repositories\CompanyDetail;


use App\Models\CompanyDetail;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EloquentCompanyDetailRepository extends RepositoryImplementation implements CompanyDetailRepository
{
    /**
     * EloquentCompanyDetailRepository constructor.
     * @param CompanyDetail $CompanyDetail
     */
    public function __construct(CompanyDetail $CompanyDetail, Log $log)
    {
        parent::__construct($log, $CompanyDetail);
    }

    public function getModel()
    {
        return new CompanyDetail();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
