<?php

namespace ApiFsVideos\V1\Rest\MediaImage;

use ZF\Rest\AbstractResourceListener;

class MediaImageResource extends AbstractResourceListener
{
    private $mediaImageRepository;

    public function __construct(MediaImageRepository $mediaImageRepository)
    {
        $this->mediaImageRepository = $mediaImageRepository;
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
        return $this->mediaImageRepository->find($id);
    }

    public function fetchAll($params = [])
    {
        return $this->mediaImageRepository->findAll();
    }
}