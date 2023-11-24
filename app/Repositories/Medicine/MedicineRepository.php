<?php

namespace App\Repositories\Medicine;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface MedicineRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
