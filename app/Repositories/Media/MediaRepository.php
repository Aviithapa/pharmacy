<?php


namespace App\Repositories\Media;


use App\Repositories\Repository;
use Illuminate\Http\Request;

interface MediaRepository extends Repository
{
    public function getPaginatedList(Request $request);
}
