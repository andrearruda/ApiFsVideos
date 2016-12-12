<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use ZF\ApiProblem\ApiProblem;
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
        $result = $this->mediaCategoryService->create($data);

        if($result instanceof \Exception)
        {
            return new ApiProblem($result->getCode(), $result->getMessage());
        }

        return $result;
    }

    public function update($id, $data)
    {
        $result = $this->mediaCategoryService->update($id, $data);

        if($result instanceof \Exception)
        {
            return new ApiProblem($result->getCode(), $result->getMessage());
        }

        return $result;
    }

    public function delete($id)
    {
        $result = $this->mediaCategoryService->delete($id);

        if($result instanceof \Exception)
        {
            return new ApiProblem($result->getCode(), $result->getMessage());
        }

        return $result;
    }

    public function fetch($id)
    {
        return $this->mediaCategoryRepository->find($id);
    }

    public function fetchAll($params = [])
    {
        return $this->mediaCategoryRepository->findAll($params);
    }
}