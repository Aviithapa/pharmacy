<?php

namespace App\Repositories\Media;


use App\Models\Media;
use App\Models\Medias;
use App\Repositories\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EloquentMediaRepository extends RepositoryImplementation implements MediaRepository
{
    /**
     * EloquentMediaRepository constructor.
     * @param Media $Media
     */
    public function __construct(Medias $media, Log $log)
    {
        parent::__construct($log, $media);
    }

    public function getModel()
    {
        return new Medias();
    }

    public function getPaginatedList(Request $request)
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
