<?php

namespace App\Repositories\Medicine;


use App\Models\Medicine;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EloquentMedicineRepository extends RepositoryImplementation implements MedicineRepository
{
    /**
     * EloquentMedicineRepository constructor.
     * @param Medicine $medicine
     */
    public function __construct(Medicine $medicine, Log $log)
    {
        parent::__construct($log, $medicine);
    }

    public function getModel()
    {
        return new Medicine();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            // ->where('created_by', Auth::user()->id)
            ->filter(new MedicineFilter($request))
            ->latest()
            ->paginate($limit);
    }
}
