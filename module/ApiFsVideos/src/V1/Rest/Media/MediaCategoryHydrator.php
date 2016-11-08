<?php

namespace ApiFsVideos\V1\Rest\Media;

use Zend\Hydrator\ClassMethods;

class MediaCategoryHydrator extends ClassMethods
{
    public function extract($object)
    {
        return array(
            'id' => $object->getId(),
            'name' => $object->getName()
        );
    }

    public function hydrate(array $data, $object)
    {
        return parent::hydrate($data, $object);
    }
}