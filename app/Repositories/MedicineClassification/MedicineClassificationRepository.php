<?php

namespace App\Repositories\MedicineClassification;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface MedicineClassificationRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
