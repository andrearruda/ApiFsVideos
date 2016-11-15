<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

class MediaCategoryService
{
    private $mediaCategoryRepository;

    public function __construct(MediaCategoryRepository $mediaCategoryRepository)
    {
        $this->mediaCategoryRepository = $mediaCategoryRepository;
    }

    public function delete($id)
    {
        $row = $this->mediaCategoryRepository->find($id);

        if($row instanceof \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryEntity)
        {
            $data = array(
                'deleted_at' => (new \DateTime())->format('Y-m-d H:i:s')
            );

            return (boolean) $this->mediaCategoryRepository->update($id, $data);
        }

        return false;
    }
}