<?php

namespace App\Repositories\Customer;

use App\Repositories\Repository;
use Illuminate\Http\Request;

interface CustomerRepository  extends  Repository
{
    public function getPaginatedList(Request $request);
}
