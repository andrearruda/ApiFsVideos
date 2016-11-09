<?php

namespace ApiFsVideos\V1\Rest\MediaImage;

use Zend\Hydrator\ClassMethods;

class MediaImageHydrator extends ClassMethods
{
    public function extract($object)
    {
        return parent::extract($object);
/*        return array(
            'media_id' => $object->getMediaId(),
            'type' => $object->getType(),
            'path' => $object->getPath()
        );*/
    }

    public function hydrate(array $data, $object)
    {
        return parent::hydrate($data, $object);
    }
}