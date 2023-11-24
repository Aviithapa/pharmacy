<?php

namespace App\Repositories\SalesItem;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface SalesItemRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
