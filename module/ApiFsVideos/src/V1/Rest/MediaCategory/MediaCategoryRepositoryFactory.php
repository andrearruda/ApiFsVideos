<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MediaCategoryRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mediaCategoryTableGateway = $container->get('ApiFsVideos\\V1\\Rest\\MediaCategory\\MediaCategoryTableGateway');

        return new MediaCategoryRepository($mediaCategoryTableGateway);
    }
}