<?php

namespace ApiFsVideos\V1\Rest\Media;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MediaRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mediaTableGateway = $container->get('ApiFsVideos\\V1\\Rest\\Media\\TableGateway');
        $mediaCategoryTableGateway = $container->get('ApiFsVideos\\V1\\Rest\\MediaCategory\\TableGateway');

        $mediaHydrator = new MediaHydrator();
        $mediaCategoryHydrator = new MediaCategoryHydrator();

        return new MediaRepository($mediaTableGateway, $mediaCategoryTableGateway, $mediaHydrator, $mediaCategoryHydrator);
    }
}