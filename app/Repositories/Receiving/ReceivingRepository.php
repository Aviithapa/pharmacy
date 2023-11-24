<?php

namespace App\Repositories\Receiving;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface ReceivingRepository  extends  Repository
{
    public function getPaginatedList(Request $request);

    public function getDistinctColumnData($column);
}
