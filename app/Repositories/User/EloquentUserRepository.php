<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class EloquentUserRepository extends RepositoryImplementation implements UserRepository
{

    /**
     * EloquentUserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user, Log $log)
    {
        parent::__construct($log, $user);
    }

    public function getModel()
    {
        return new User();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->getModel()->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
