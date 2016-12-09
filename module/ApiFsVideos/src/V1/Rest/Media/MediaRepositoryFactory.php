<?php

namespace ApiFsVideos\V1\Rest\Media;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MediaRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mediaTableGateway = $container->get('ApiFsVideos\\V1\\Rest\\Media\\MediaTableGateway');

        return new MediaRepository($mediaTableGateway);
    }
}