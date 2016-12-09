<?php

namespace ApiFsVideos\V1\Rest\Media;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MediaServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mediaRepository = $container->get('ApiFsVideos\\V1\\Rest\\Media\\MediaRepository');
        $mediaTableGateway = $container->get('ApiFsVideos\\V1\\Rest\\Media\\MediaTableGateway');
        
        return new MediaService($mediaRepository, $mediaTableGateway);
    }
}