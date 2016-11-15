<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use ZF\Rest\AbstractResourceListener;

class MediaCategoryResource extends AbstractResourceListener
{
    private $mediaCategoryRepository;
    private $mediaCategoryService;

    public function __construct(MediaCategoryRepository $mediaCategoryRepository, MediaCategoryService $mediaCategoryService)
    {
        $this->mediaCategoryRepository = $mediaCategoryRepository;
        $this->mediaCategoryService = $mediaCategoryService;
    }

    public function create($data)
    {
        return false;
    }

    public function delete($id)
    {
        return $this->mediaCategoryService->delete($id);
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