<?php

namespace App\Repositories\Sales;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface SalesRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
