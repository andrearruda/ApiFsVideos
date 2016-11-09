<?php

namespace ApiFsVideos\V1\Rest\MediaImage;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MediaImageResourceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mediaImageRepository = $container->get('ApiFsVideos\\V1\\Rest\\MediaImage\\MediaImageRepository');

        return new MediaImageResource($mediaImageRepository);
    }
}