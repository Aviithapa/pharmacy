<?php


namespace App\Services\Media;


use App\Repositories\Media\MediaRepository;

class MediaCreator
{
    protected  $mediaRepository;

    public function __construct(MediaRepository $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }


    public function store($data)
    {
        $media =  $this->mediaRepository->create($data);
        return $media;
    }
}
