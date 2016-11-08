<?php

namespace ApiFsVideos\V1\Rest\MediaImage;

use Interop\Container\ContainerInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

class TableGatewayFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $hydratingResultSet = new HydratingResultSet(new MediaImageHydrator(), new MediaImageEntity());
        $dbAdapter = $container->get('DbAdapter');

        return new TableGateway('media_image', $dbAdapter, null, $hydratingResultSet);
    }

}