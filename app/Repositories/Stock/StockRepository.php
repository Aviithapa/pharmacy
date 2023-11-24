<?php

namespace App\Repositories\Stock;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface StockRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
