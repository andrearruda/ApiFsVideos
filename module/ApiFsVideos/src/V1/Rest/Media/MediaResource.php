<?php

namespace ApiFsVideos\V1\Rest\Media;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class MediaResource extends AbstractResourceListener
{
    private $mediaRepository;
    private $mediaService;

    public function __construct(MediaRepository $mediaRepository, MediaService $mediaService)
    {
        $this->mediaRepository = $mediaRepository;
        $this->mediaService = $mediaService;
    }

    public function create($data)
    {
        $result = $this->mediaService->create($data);

        if($result instanceof \Exception)
        {
            return new ApiProblem($result->getCode(), $result->getMessage());
        }

        return $result;
    }

    public function update($id, $data)
    {
        $result = $this->mediaService->update($id, $data);

        if($result instanceof \Exception)
        {
            return new ApiProblem($result->getCode(), $result->getMessage());
        }

        return $result;
    }

    public function delete($id)
    {
        $result = $this->mediaService->delete($id);

        if($result instanceof \Exception)
        {
            return new ApiProblem($result->getCode(), $result->getMessage());
        }

        return $result;
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