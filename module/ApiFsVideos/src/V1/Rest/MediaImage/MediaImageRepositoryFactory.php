<?php

namespace ApiFsVideos\V1\Rest\MediaImage;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MediaImageRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $tableGateway = $container->get('ApiFsVideos\\V1\\Rest\\MediaImage\\TableGateway');
        return new MediaImageRepository($tableGateway);
    }
}