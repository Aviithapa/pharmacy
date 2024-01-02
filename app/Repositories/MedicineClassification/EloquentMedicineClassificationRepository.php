<?php

namespace App\Repositories\MedicineClassification;


use App\Models\MedicineClassification;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EloquentMedicineClassificationRepository extends RepositoryImplementation implements MedicineClassificationRepository
{
    /**
     * EloquentMedicineClassificationRepository constructor.
     * @param MedicineClassification $medicineClassification
     */
    public function __construct(MedicineClassification $medicineClassification, Log $log)
    {
        parent::__construct($log, $medicineClassification);
    }

    public function getModel()
    {
        return new MedicineClassification();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->filter(new MedicineClassificationFilter($request))
            ->latest()
            ->paginate($limit);
    }
}
