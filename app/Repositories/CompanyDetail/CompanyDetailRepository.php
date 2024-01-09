<?php

namespace App\Repositories\CompanyDetail;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface CompanyDetailRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
