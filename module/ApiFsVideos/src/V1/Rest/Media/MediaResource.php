<?php

namespace ApiFsVideos\V1\Rest\Media;

use ZF\Rest\AbstractResourceListener;

class MediaResource extends AbstractResourceListener
{
    private $mediaRepository;

    public function __construct(MediaRepository $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }

    public function create($data)
    {
        return false;
    }

    public function delete($id)
    {
        return false;
    }

    public function update($id, $data)
    {
        return false;
    }

    public function fetch($id)
    {
        return $this->mediaRepository->find($id);
    }

    public function fetchAll($params = [])
    {
        return $this->mediaRepository->findAll();
    }
}