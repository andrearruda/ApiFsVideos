<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use Zend\Hydrator\ClassMethods;

class MediaCategoryHydrator extends ClassMethods
{
    public function extract($object)
    {
        return array(
            'id' => $object->getId(),
            'name' => $object->getName(),
            'created_at' => $object->getCreatedAt(),
            'updated_at' => $object->getCreatedAt(),
            'active' => $object->getActive()
        );
    }

    public function hydrate(array $data, $object)
    {
        return parent::hydrate($data, $object);
    }
}