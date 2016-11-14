<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use ZF\Rest\AbstractResourceListener;

class MediaCategoryResource extends AbstractResourceListener
{
    private $mediaCategoryRepository;

    public function __construct(MediaCategoryRepository $mediaCategoryRepository)
    {
        $this->mediaCategoryRepository = $mediaCategoryRepository;
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
        return $this->mediaCategoryRepository->find($id);
    }

    public function fetchAll($params = [])
    {
        return $this->mediaCategoryRepository->findAll();
    }
}