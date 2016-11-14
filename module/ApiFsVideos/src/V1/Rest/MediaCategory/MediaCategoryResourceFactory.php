<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MediaCategoryResourceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mediaCategoryRepository = $container->get('ApiFsVideos\\V1\\Rest\\MediaCategory\\MediaCategoryRepository');

        return new MediaCategoryResource($mediaCategoryRepository);
    }
}