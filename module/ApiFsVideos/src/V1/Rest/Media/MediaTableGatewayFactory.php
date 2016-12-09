<?php

namespace ApiFsVideos\V1\Rest\Media;

use Interop\Container\ContainerInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Hydrator\ArraySerializable;

class MediaTableGatewayFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $hydratingResultSet = new HydratingResultSet(new ArraySerializable(), new MediaEntity());
        $dbAdapter = $container->get('DbAdapter');

        return new TableGateway('media', $dbAdapter, null, $hydratingResultSet);
    }
}