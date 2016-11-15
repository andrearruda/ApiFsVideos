<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MediaCategoryServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mediaCategoryRepository = $container->get('ApiFsVideos\\V1\\Rest\\MediaCategory\\MediaCategoryRepository');
        $mediaCategoryTableGateway = $container->get('ApiFsVideos\\V1\\Rest\\MediaCategory\\MediaCategoryTableGateway');

        return new MediaCategoryService($mediaCategoryRepository, $mediaCategoryTableGateway);
    }
}