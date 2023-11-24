<?php

namespace App\Repositories\Supplier;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface SupplierRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
